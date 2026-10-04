<?php

namespace Tests\Feature;

use App\Models\Donation;
use App\Models\Payment;
use App\Models\User;
use App\Payments\Support\RevenueTrend;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * RevenueTrend — the roadmap's "Grafik pendapatan" item.
 *
 * Every assertion here is about the *shape of the answer an operator
 * reads*, not about a rendering. The three failure modes that matter
 * were all silent before this existed:
 *
 *  1. Refunded money counted as income.
 *  2. A quiet day vanished from the chart instead of reading as zero,
 *     so a straight line implied steady revenue where there was none.
 *  3. The window could be driven into an unbounded loop by a mangled
 *     query string, since the bucket count is what the loop runs on.
 */
class RevenueTrendTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }

    private function paid(int $amount, string $paidAt): Payment
    {
        $user = User::factory()->create();

        return Payment::create([
            'user_id' => $user->id,
            'payable_type' => (new Donation)->getMorphClass(),
            'payable_id' => Donation::factory()->create(['user_id' => $user->id])->id,
            'amount' => $amount,
            'currency' => 'IDR',
            'method' => 'bank_transfer',
            'status' => Payment::STATUS_PAID,
            'paid_at' => $paidAt,
            'expires_at' => now()->addDay(),
        ]);
    }

    /**
     * @param  list<array{key: string, label: string, total: float, count: int}>  $buckets
     */
    private function countFor(array $buckets, string $key): int
    {
        foreach ($buckets as $bucket) {
            if ($bucket['key'] === $key) {
                return $bucket['count'];
            }
        }

        $this->fail("Bucket {$key} was not built.");
    }

    public function test_a_daily_buckets_line_totals_exactly_and_keeps_every_day(): void
    {
        $this->travelTo(now()->setDate(2026, 10, 4)->startOfDay()->addHours(12), function (): void {
            // Two payments on the same day must land in one bucket, not two.
            $this->paid(50_000, '2026-10-04 06:00:00');
            $this->paid(25_000, '2026-10-04 10:00:00');

            $buckets = RevenueTrend::build(RevenueTrend::DAILY);

            $this->assertCount(14, $buckets, 'The default daily span is 14 days, gaps included.');

            $last = end($buckets);
            $this->assertSame('2026-10-04', $last['key']);
            $this->assertSame(75_000.0, $last['total']);
            $this->assertSame(2, $last['count']);

            // Every earlier day reads zero rather than being absent: a
            // missing bucket and a no-sale day must look the same on the
            // chart, or an operator reads a straight line as steady
            // revenue.
            $others = array_slice($buckets, 0, -1);
            $this->assertNotEmpty($others);

            foreach ($others as $bucket) {
                $this->assertSame(0.0, $bucket['total'], $bucket['label'].' should read zero.');
                $this->assertSame(0, $bucket['count'], $bucket['label'].' should read zero.');
            }
        });
    }

    public function test_refunded_money_is_not_income(): void
    {
        $this->travelTo(now()->setDate(2026, 10, 4)->startOfDay()->addHours(12), function (): void {
            $this->paid(100_000, '2026-10-04 09:00:00');

            $user = User::factory()->create();
            Payment::create([
                'user_id' => $user->id,
                'payable_type' => (new Donation)->getMorphClass(),
                'payable_id' => Donation::factory()->create(['user_id' => $user->id])->id,
                'amount' => 999_999,
                'currency' => 'IDR',
                'method' => 'bank_transfer',
                'status' => Payment::STATUS_REFUNDED,
                'paid_at' => '2026-10-04 11:00:00',
                'expires_at' => '2026-10-05 00:00:00',
            ]);

            $summary = RevenueTrend::summary(RevenueTrend::build(RevenueTrend::DAILY));

            $this->assertSame(
                100_000.0,
                $summary['total'],
                'A refunded row is money that came in and went back out.',
            );
            $this->assertSame(1, $summary['count']);
        });
    }

    public function test_pending_failed_and_expired_rows_never_reach_the_chart(): void
    {
        $this->travelTo(now()->setDate(2026, 10, 4)->startOfDay()->addHours(12), function (): void {
            foreach ([Payment::STATUS_PENDING, Payment::STATUS_FAILED, Payment::STATUS_EXPIRED] as $index => $status) {
                $user = User::factory()->create();
                Payment::create([
                    'user_id' => $user->id,
                    'payable_type' => (new Donation)->getMorphClass(),
                    'payable_id' => Donation::factory()->create(['user_id' => $user->id])->id,
                    'amount' => 1_000,
                    'currency' => 'IDR',
                    'method' => 'bank_transfer',
                    'status' => $status,
                    'paid_at' => now()->subHours($index + 1)->toDateTimeString(),
                    'expires_at' => now()->addDay()->toDateTimeString(),
                ]);
            }

            $summary = RevenueTrend::summary(RevenueTrend::build(RevenueTrend::DAILY));

            $this->assertSame(0.0, $summary['total']);
            $this->assertSame(0, $summary['count']);
        });
    }

    public function test_a_weekly_granularity_floors_to_the_week_start(): void
    {
        // 2026-10-04 is a Sunday, so a payment that day belongs to the
        // week that began on Monday 2026-09-28. A chart that put it in
        // the following week would disagree with the bank statement.
        $this->travelTo(now()->setDate(2026, 10, 4)->startOfDay()->addHours(10), function (): void {
            $this->paid(70_000, '2026-09-28 09:00:00'); // Monday
            $this->paid(30_000, '2026-10-04 09:00:00'); // Sunday, same week

            $buckets = RevenueTrend::build(RevenueTrend::WEEKLY);

            $this->assertCount(12, $buckets, 'The default weekly span is 12 weeks.');

            $sums = array_column($buckets, 'total', 'key');
            $this->assertArrayHasKey('2026-09-28', $sums);
            $this->assertSame(100_000.0, $sums['2026-09-28'], 'Both rows are in the week starting 2026-09-28.');
            $this->assertSame(2, $this->countFor($buckets, '2026-09-28'));

            // The window ends today, so no later week can hold revenue.
            $this->assertSame(
                ['2026-09-28'],
                array_keys(array_filter($sums, fn (float $total): bool => $total > 0)),
            );
        });
    }

    public function test_a_monthly_granularity_uses_one_bucket_per_calendar_month(): void
    {
        $this->travelTo(now()->setDate(2026, 10, 2)->startOfDay()->addHours(9), function (): void {
            $this->paid(10_000, '2026-08-15 09:00:00');
            $this->paid(20_000, '2026-09-15 09:00:00');
            $this->paid(30_000, '2026-09-20 09:00:00');
            $this->paid(40_000, '2026-10-01 09:00:00');

            $buckets = RevenueTrend::build(RevenueTrend::MONTHLY);
            $sums = array_column($buckets, 'total', 'key');

            $this->assertCount(12, $buckets);
            $this->assertSame(10_000.0, $sums['2026-08']);
            $this->assertSame(50_000.0, $sums['2026-09'], 'September carries two payments.');
            $this->assertSame(40_000.0, $sums['2026-10']);
            $this->assertSame(2, $this->countFor($buckets, '2026-09'));
        });
    }

    public function test_an_unknown_granularity_falls_back_to_daily_instead_of_throwing(): void
    {
        $this->assertSame(RevenueTrend::DAILY, RevenueTrend::normaliseGranularity('yearly'));
        $this->assertSame(RevenueTrend::DAILY, RevenueTrend::normaliseGranularity(null));
        $this->assertSame(RevenueTrend::DAILY, RevenueTrend::normaliseGranularity(['daily']));
        $this->assertSame(RevenueTrend::DAILY, RevenueTrend::normaliseGranularity(''));
        $this->assertSame(RevenueTrend::WEEKLY, RevenueTrend::normaliseGranularity('weekly'));
        $this->assertSame(RevenueTrend::MONTHLY, RevenueTrend::normaliseGranularity('monthly'));
    }

    public function test_a_reversed_window_does_not_loop_forever(): void
    {
        $buckets = RevenueTrend::build(
            RevenueTrend::DAILY,
            now()->setDate(2026, 10, 1)->startOfDay(),
            now()->setDate(2026, 9, 1)->endOfDay(),
        );

        $this->assertNotEmpty($buckets);
        $this->assertLessThanOrEqual(400, count($buckets));
    }

    public function test_a_pathological_window_is_capped_rather_than_exhausting_memory(): void
    {
        // 1970 to today at daily granularity is roughly 20 000 buckets.
        // Without the cap the loop would build every one of them on the
        // operator's queue, which is a self-inflicted DoS via query string.
        $buckets = RevenueTrend::build(
            RevenueTrend::DAILY,
            now()->setDate(1970, 1, 2)->startOfDay(),
            now(),
        );

        $this->assertCount(400, $buckets);
    }

    public function test_labels_are_what_an_operator_can_read_off_a_bank_statement(): void
    {
        $this->travelTo(now()->setDate(2026, 10, 4)->startOfDay()->addHours(9), function (): void {
            $daily = RevenueTrend::build(RevenueTrend::DAILY);
            $this->assertSame('4 Okt', end($daily)['label']);

            $weekly = RevenueTrend::build(RevenueTrend::WEEKLY);
            $this->assertStringContainsString('–', end($weekly)['label']);
            $this->assertStringContainsString('Okt', end($weekly)['label']);

            $monthly = RevenueTrend::build(RevenueTrend::MONTHLY);
            $this->assertSame('Okt 2026', end($monthly)['label']);
        });
    }

    public function test_the_summary_reports_an_average_that_survives_a_flat_period(): void
    {
        $this->travelTo(now()->setDate(2026, 10, 10)->startOfDay()->addHours(9), function (): void {
            $this->paid(30_000, '2026-10-10 09:00:00');

            $summary = RevenueTrend::summary(RevenueTrend::build(RevenueTrend::DAILY));

            // 30 000 over 14 days, not over one: dividing by the number of
            // days *with* sales would report 30 000 and hide the fact that
            // this is a 14-day-old business.
            $this->assertEqualsWithDelta(30_000 / 14, $summary['average'], 0.01);
            $this->assertSame(30_000.0, $summary['peak']);
            $this->assertSame(1, $summary['count']);
        });
    }

    public function test_summary_of_an_empty_chart_is_zero_rather_than_a_division_error(): void
    {
        $summary = RevenueTrend::summary([]);

        $this->assertSame(0.0, $summary['total']);
        $this->assertSame(0, $summary['count']);
        $this->assertSame(0.0, $summary['average']);
        $this->assertSame(0.0, $summary['peak']);
    }

    public function test_paid_rows_outside_the_window_are_excluded(): void
    {
        $this->travelTo(now()->setDate(2026, 10, 4)->startOfDay()->addHours(9), function (): void {
            $this->paid(500_000, '2026-01-01 09:00:00');
            $this->paid(1_000, '2026-10-03 09:00:00');

            $buckets = RevenueTrend::build(RevenueTrend::DAILY);

            $this->assertSame(1_000.0, RevenueTrend::summary($buckets)['total']);
        });
    }

    public function test_a_custom_window_overrides_the_default_span(): void
    {
        $this->travelTo(now()->setDate(2026, 10, 10)->startOfDay()->addHours(9), function (): void {
            $this->paid(30_000, '2026-10-08 09:00:00');

            $buckets = RevenueTrend::build(
                RevenueTrend::DAILY,
                now()->setDate(2026, 10, 6)->startOfDay(),
                now()->setDate(2026, 10, 8)->endOfDay(),
            );

            $this->assertCount(3, $buckets, 'Only the requested window, not the 14-day default.');
            $this->assertSame(30_000.0, RevenueTrend::summary($buckets)['total']);
        });
    }

    /**
     * The switcher renders whatever captions() returns, so a granularity
     * without a caption is a button the operator can click and the
     * controller will throw away. Cheaper to catch here.
     */
    public function test_every_accepted_granularity_has_a_caption_unit_and_span(): void
    {
        foreach (RevenueTrend::granularities() as $granularity) {
            $this->assertArrayHasKey(
                $granularity,
                RevenueTrend::captions(),
                "The {$granularity} switcher would render a blank button.",
            );
            $this->assertNotSame('', RevenueTrend::unitFor($granularity));
            $this->assertGreaterThan(0, RevenueTrend::spanFor($granularity));
        }

        // And the reverse: a caption nobody can select is a button that
        // silently snaps back to daily.
        $this->assertSame(RevenueTrend::granularities(), array_keys(RevenueTrend::captions()));

        // normaliseGranularity() must accept exactly the advertised set.
        foreach (RevenueTrend::captions() as $value => $_) {
            $this->assertSame($value, RevenueTrend::normaliseGranularity($value));
        }
    }

    public function test_the_unit_is_used_in_the_rendered_average_caption(): void
    {
        $this->travelTo(now()->setDate(2026, 10, 10)->startOfDay()->addHours(9), function (): void {
            $this->paid(90_000, '2026-10-08 09:00:00');

            foreach (RevenueTrend::granularities() as $granularity) {
                $response = $this->actingAs($this->admin())
                    ->get('/admin/payments?granularity='.$granularity);

                $response->assertOk();
                $response->assertViewHas('granularityUnit', RevenueTrend::unitFor($granularity));
                $response->assertSee('Rata-rata per '.RevenueTrend::unitFor($granularity));
            }
        });
    }
}
