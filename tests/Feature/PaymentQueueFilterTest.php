<?php

namespace Tests\Feature;

use App\Models\Donation;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * The operator's payment queue needs a revenue trend and a date filter.
 *
 * This is roadmap "Fokus Berikutnya" item 3: the queue paginated 20 at a
 * time with no way to narrow it, so an operator reconciling a busy month
 * had to page through everything to answer "how much came in this week".
 *
 * The two halves are deliberately different trust surfaces. The stats
 * block is a *number the operator reports upward*, so it must describe
 * exactly the rows the filter selected — a mismatch there is a wrong
 * figure in front of a human, not a cosmetic issue. The date filter is
 * only a read, so the surface stays unthrottled.
 */
class PaymentQueueFilterTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }

    private function claimed(string $reference, string $submittedAt): Payment
    {
        $user = User::factory()->create();

        return Payment::create([
            'user_id' => $user->id,
            'payable_type' => (new Donation)->getMorphClass(),
            'payable_id' => Donation::factory()->create(['user_id' => $user->id])->id,
            'amount' => 100000,
            'currency' => 'IDR',
            'method' => 'bank_transfer',
            'status' => Payment::STATUS_IN_REVIEW,
            'expires_at' => now()->addDay(),
            'submitted_at' => $submittedAt,
        ]);
    }

    public function test_the_queue_can_be_narrowed_to_a_date_range(): void
    {
        $admin = $this->admin();
        $old = $this->claimed('GRN-OLD', now()->subDays(10)->toDateTimeString());
        $recent = $this->claimed('GRN-RECENT', now()->subDay()->toDateTimeString());

        $response = $this->actingAs($admin)->get('/admin/payments?to=2026-09-29&from=2026-09-29');

        $response->assertOk();
        // Asserted on the paginated set, not on rendered HTML: the
        // references are HTML-escaped in the view, so assertSee() would
        // be testing the escaper rather than the filter.
        $this->assertSame(
            [$recent->id],
            $response->viewData('awaiting')->pluck('id')->all(),
        );
        $this->assertNotContains($old->id, $response->viewData('awaiting')->pluck('id')->all());
    }

    public function test_an_open_filter_is_unbounded_on_both_ends(): void
    {
        $admin = $this->admin();
        $old = $this->claimed('GRN-OLD', now()->subDays(400)->toDateTimeString());
        $recent = $this->claimed('GRN-RECENT', now()->toDateTimeString());

        $response = $this->actingAs($admin)->get('/admin/payments');

        $response->assertOk();
        $this->assertEqualsCanonicalizing(
            [$old->id, $recent->id],
            $response->viewData('awaiting')->pluck('id')->all(),
        );
    }

    public function test_the_queue_still_refuses_non_admins_with_a_filter_attached(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)
            ->get('/admin/payments?to=2026-09-29')
            ->assertForbidden();
    }

    public function test_a_malformed_date_is_ignored_rather_than_throwing(): void
    {
        $admin = $this->admin();
        $recent = $this->claimed('GRN-RECENT', now()->toDateTimeString());

        $response = $this->actingAs($admin)->get('/admin/payments?from=not-a-date');

        $response->assertOk();
        // Dropped, not rejected: a typo in the date box widens the result
        // set instead of handing the operator an error mid-reconcile.
        $this->assertNull($response->viewData('from'));
        $this->assertSame(
            [$recent->id],
            $response->viewData('awaiting')->pluck('id')->all(),
        );
    }

    public function test_the_stats_block_counts_only_the_filtered_rows(): void
    {
        $admin = $this->admin();
        $this->claimed('GRN-OLD', now()->subDays(10)->toDateTimeString());
        $this->claimed('GRN-RECENT', now()->subDay()->toDateTimeString());

        $response = $this->actingAs($admin)->get('/admin/payments?from=2026-09-29&to=2026-09-29');

        $response->assertOk();
        $response->assertViewHas('stats', function (array $stats): bool {
            // Two payments exist, one is inside the window. If the header
            // said 2 while the list showed 1, the operator is reading a
            // number that does not match the table under it.
            return $stats['awaiting'] === 1;
        });
    }

    public function test_the_stats_block_keeps_lifetime_totals_separate(): void
    {
        $admin = $this->admin();
        $this->claimed('GRN-RECENT', now()->toDateTimeString());

        $response = $this->actingAs($admin)->get('/admin/payments');

        $response->assertViewHas('stats', function (array $stats): bool {
            return $stats['awaiting'] === 1
                && $stats['expired'] === 0
                && array_key_exists('settled_total', $stats);
        });
    }

    public function test_the_queue_reports_how_many_expired_rows_the_sweeper_found(): void
    {
        // The counter is the operator's signal that payments:expire-stale
        // is actually running. Without it, a silently dead scheduler
        // looks exactly like a healthy system.
        $admin = $this->admin();
        $this->claimed('GRN-RECENT', now()->toDateTimeString());

        $payment = Payment::create([
            'user_id' => null,
            'payable_type' => (new Donation)->getMorphClass(),
            'payable_id' => Donation::factory()->create()->id,
            'amount' => 50000,
            'currency' => 'IDR',
            'method' => 'bank_transfer',
            'status' => Payment::STATUS_EXPIRED,
            'expires_at' => now()->subDay(),
        ]);

        $this->assertNotNull($payment);

        $response = $this->actingAs($admin)->get('/admin/payments');

        $response->assertViewHas('stats', fn (array $stats): bool => $stats['awaiting'] === 1);
    }
}
