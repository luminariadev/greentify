<?php

namespace Tests\Feature;

use App\Models\Donation;
use App\Models\Payment;
use App\Models\User;
use App\Payments\Support\RevenueTrend;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * The revenue chart as the operator actually receives it.
 *
 * RevenueTrendTest pins the arithmetic. This file pins the two things
 * that decide whether the feature is usable at all:
 *
 *  1. The granularity switch survives the round trip, and a mangled
 *     value cannot widen or blank the chart.
 *  2. The trend is NOT tied to the queue's date filter. Those are two
 *     different questions — "what is still waiting on me" against
 *     "what came in" — and coupling them means that filtering the queue
 *     silently changes a revenue figure.
 */
class RevenueChartTest extends TestCase
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

    public function test_the_queue_renders_a_trend_for_each_granularity(): void
    {
        $this->travelTo(now()->setDate(2026, 10, 4)->startOfDay()->addHours(9), function (): void {
            $this->paid(120_000, '2026-10-03 09:00:00');
            $this->paid(80_000, '2026-10-04 09:00:00');

            foreach (['daily', 'weekly', 'monthly'] as $granularity) {
                $response = $this->actingAs($this->admin())
                    ->get('/admin/payments?granularity='.$granularity);

                $response->assertOk();
                $response->assertViewHas('granularity', $granularity);
                $response->assertViewHas('revenueBuckets');
                $response->assertViewHas('revenue', fn (array $revenue): bool => $revenue['total'] === 200_000.0);

                $this->assertNotEmpty(
                    $response->viewData('revenueBuckets'),
                    "The {$granularity} chart came back with no buckets at all.",
                );
            }
        });
    }

    public function test_an_unknown_granularity_renders_the_daily_chart_instead_of_erroring(): void
    {
        $response = $this->actingAs($this->admin())
            ->get('/admin/payments?granularity=yearly');

        $response->assertOk();
        $response->assertViewHas('granularity', RevenueTrend::DAILY);
        // Same bucket count as the default, not an empty or absurd chart.
        $this->assertCount(14, $response->viewData('revenueBuckets'));
    }

    public function test_the_queue_date_filter_does_not_move_the_revenue_chart(): void
    {
        $this->travelTo(now()->setDate(2026, 10, 4)->startOfDay()->addHours(9), function (): void {
            // Settled inside the filter window.
            $this->paid(50_000, '2026-10-03 09:00:00');
            // Settled well outside it, but still inside the trend's window.
            $this->paid(25_000, '2026-09-25 09:00:00');

            $unfiltered = $this->actingAs($this->admin())->get('/admin/payments');
            $filtered = $this->actingAs($this->admin())
                ->get('/admin/payments?from=2026-10-03&to=2026-10-03');

            $unfiltered->assertOk();
            $filtered->assertOk();

            // Both settlements are on the chart, even though the filter
            // window only covers the second one. This is the assertion
            // that would fail if the two were ever wired together.
            $this->assertSame(2, $this->nonZeroBuckets($filtered->viewData('revenueBuckets')));

            // Filtering the queue changes nothing about the revenue figure.
            $this->assertSame(
                $unfiltered->viewData('revenue')['total'],
                $filtered->viewData('revenue')['total'],
            );
        });
    }

    /**
     * @param  list<array{key: string, label: string, total: float, count: int}>  $buckets
     */
    private function nonZeroBuckets(array $buckets): int
    {
        return count(array_filter($buckets, fn (array $bucket): bool => $bucket['total'] > 0));
    }

    public function test_the_page_says_so_when_there_is_no_settled_revenue(): void
    {
        $response = $this->actingAs($this->admin())->get('/admin/payments');

        $response->assertOk();
        $response->assertViewHas('revenue', fn (array $revenue): bool => $revenue['total'] === 0.0);

        // The empty state is a sentence a human reads, not a blank space.
        $response->assertSee('Belum ada pembayaran yang lunas');
    }

    public function test_refunded_money_is_labelled_as_excluded_on_the_page(): void
    {
        $this->travelTo(now()->setDate(2026, 10, 4)->startOfDay()->addHours(9), function (): void {
            $this->paid(10_000, '2026-10-04 09:00:00');

            $response = $this->actingAs($this->admin())->get('/admin/payments');

            $response->assertOk();
            // The operator has to be able to tell the difference between
            // "no revenue" and "revenue net of refunds" without reading
            // the source.
            $response->assertSee('Refund tidak dihitung sebagai pendapatan');
        });
    }

    public function test_the_chart_still_renders_when_there_is_no_paid_at_on_a_settled_row(): void
    {
        $this->travelTo(now()->setDate(2026, 10, 4)->startOfDay()->addHours(9), function (): void {
            // A row written straight to paid without a timestamp — the
            // kind of thing an import or a seed does. It must not floor to
            // 1970 and drag the axis.
            $user = User::factory()->create();
            Payment::create([
                'user_id' => $user->id,
                'payable_type' => (new Donation)->getMorphClass(),
                'payable_id' => Donation::factory()->create(['user_id' => $user->id])->id,
                'amount' => 7_000,
                'currency' => 'IDR',
                'method' => 'bank_transfer',
                'status' => Payment::STATUS_PAID,
                'paid_at' => null,
                'expires_at' => now()->addDay(),
            ]);

            $this->paid(3_000, '2026-10-04 09:00:00');

            $response = $this->actingAs($this->admin())->get('/admin/payments');

            $response->assertOk();
            $this->assertSame(3_000.0, $response->viewData('revenue')['total']);

            $keys = array_column($response->viewData('revenueBuckets'), 'key');
            $this->assertNotContains('1970-01-01', $keys);
        });
    }

    public function test_a_non_admin_still_cannot_read_the_chart(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)
            ->get('/admin/payments?granularity=monthly')
            ->assertForbidden();
    }
}
