<?php

namespace Tests\Feature;

use App\Models\Donation;
use App\Models\Membership;
use App\Models\MembershipTier;
use App\Models\Payment;
use App\Models\User;
use App\Notifications\PaymentReviewed;
use App\Payments\PaymentManager;
use Database\Seeders\MembershipTiersSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

/**
 * The operator review queue.
 *
 * These tests exist because of a real bug: before 29 Sep 2026,
 * POST /payments/{ref}/confirm settled the payment itself, so a payer
 * could mark their own donation completed. The test that mattered most —
 * test_confirming_does_not_settle_the_payment — is the regression guard.
 */
class PaymentReviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_confirming_does_not_settle_the_payment(): void
    {
        $user = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $user->id]);
        $payment = $this->charge($donation);

        $this->actingAs($user)
            ->post('/payments/'.$payment->reference.'/confirm')
            ->assertRedirect();

        $payment->refresh();

        $this->assertSame(
            Payment::STATUS_IN_REVIEW,
            $payment->status,
            'The payer must not be able to settle their own payment.',
        );
        $this->assertFalse($payment->isPaid());
        $this->assertNotNull($payment->submitted_at);
        $this->assertNull($payment->reviewed_at, 'No operator decision has been made yet.');

        $this->assertSame(
            Donation::STATUS_PENDING,
            $donation->refresh()->status,
            'A claimed donation must not count towards the total.',
        );
    }

    public function test_confirming_twice_does_not_re_enqueue(): void
    {
        $user = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $user->id]);
        $payment = $this->charge($donation);

        $this->actingAs($user)->post('/payments/'.$payment->reference.'/confirm');
        $firstSubmittedAt = $payment->refresh()->submitted_at;

        $this->actingAs($user)
            ->post('/payments/'.$payment->reference.'/confirm')
            ->assertSessionHas('error');

        $this->assertTrue(
            $firstSubmittedAt->equalTo($payment->refresh()->submitted_at),
            'A second press must not reset the queue timestamp.',
        );
    }

    public function test_a_non_admin_cannot_reach_the_queue(): void
    {
        $user = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $user->id]);
        $payment = $this->charge($donation);
        PaymentManager::class;
        app(PaymentManager::class)->submitForReview($payment);

        $this->actingAs($user)->get('/admin/payments')->assertForbidden();
        $this->actingAs($user)
            ->post('/admin/payments/'.$payment->reference.'/approve')
            ->assertForbidden();
    }

    public function test_approving_settles_the_payment_and_completes_the_donation(): void
    {
        $admin = $this->admin();
        $payer = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $payer->id]);
        $payment = $this->charge($donation);

        app(PaymentManager::class)->submitForReview($payment);

        $this->actingAs($admin)
            ->post('/admin/payments/'.$payment->reference.'/approve')
            ->assertRedirect(route('admin.payments.index'))
            ->assertSessionHas('success');

        $payment->refresh();

        $this->assertTrue($payment->isPaid());
        $this->assertSame($admin->id, $payment->reviewed_by);
        $this->assertNotNull($payment->reviewed_at);
        $this->assertSame(Donation::STATUS_COMPLETED, $donation->refresh()->status);
    }

    public function test_approving_activates_a_paid_membership(): void
    {
        $this->seed(MembershipTiersSeeder::class);

        $admin = $this->admin();
        $payer = User::factory()->create();
        $tier = MembershipTier::where('slug', 'pro-green')->firstOrFail();

        $this->actingAs($payer)->post('/membership/subscribe/'.$tier->id);
        $membership = Membership::latest('id')->firstOrFail();
        $payment = Payment::where('payable_type', Membership::class)
            ->where('payable_id', $membership->id)
            ->latest('id')
            ->firstOrFail();

        $this->assertFalse($membership->is_active, 'Inactive until the operator approves.');

        app(PaymentManager::class)->submitForReview($payment);

        $this->actingAs($admin)->post('/admin/payments/'.$payment->reference.'/approve');

        $membership->refresh();

        $this->assertTrue($membership->is_active);
        $this->assertTrue($membership->expires_at->isAfter(now()));
    }

    public function test_rejecting_fails_the_payment_and_keeps_the_note(): void
    {
        $admin = $this->admin();
        $payer = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $payer->id]);
        $payment = $this->charge($donation);

        app(PaymentManager::class)->submitForReview($payment);

        $this->actingAs($admin)
            ->post('/admin/payments/'.$payment->reference.'/reject', [
                'note' => 'Transfer belum muncul di rekening bank.',
            ])
            ->assertRedirect(route('admin.payments.index'));

        $payment->refresh();

        $this->assertSame(Payment::STATUS_FAILED, $payment->status);
        $this->assertSame('Transfer belum muncul di rekening bank.', $payment->review_note);
        $this->assertSame($admin->id, $payment->reviewed_by);
        $this->assertSame(Donation::STATUS_PENDING, $donation->refresh()->status);
    }

    public function test_rejecting_requires_a_meaningful_note(): void
    {
        $admin = $this->admin();
        $payer = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $payer->id]);
        $payment = $this->charge($donation);

        app(PaymentManager::class)->submitForReview($payment);

        $this->actingAs($admin)
            ->post('/admin/payments/'.$payment->reference.'/reject', ['note' => 'nope'])
            ->assertSessionHasErrors('note');

        $this->assertSame(
            Payment::STATUS_IN_REVIEW,
            $payment->refresh()->status,
            'A rejected validation must leave the payment in the queue.',
        );
    }

    public function test_approving_twice_does_not_settle_twice(): void
    {
        $admin = $this->admin();
        $payer = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $payer->id]);
        $payment = $this->charge($donation);

        app(PaymentManager::class)->submitForReview($payment);

        $this->actingAs($admin)->post('/admin/payments/'.$payment->reference.'/approve');
        $paidAt = $payment->refresh()->paid_at;

        // Replaying the button must not re-apply the effect.
        $this->actingAs($admin)
            ->post('/admin/payments/'.$payment->reference.'/approve')
            ->assertStatus(409);

        $this->assertTrue($paidAt->equalTo($payment->refresh()->paid_at));
    }

    public function test_the_queue_lists_claimed_payments(): void
    {
        $admin = $this->admin();
        $payer = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $payer->id]);
        $payment = $this->charge($donation);

        app(PaymentManager::class)->submitForReview($payment);

        $this->actingAs($admin)
            ->get('/admin/payments')
            ->assertOk()
            ->assertSee($payment->reference);
    }

    public function test_the_payer_is_notified_of_the_decision(): void
    {
        Notification::fake();

        $admin = $this->admin();
        $payer = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $payer->id]);
        $payment = $this->charge($donation);

        app(PaymentManager::class)->submitForReview($payment);
        $this->actingAs($admin)->post('/admin/payments/'.$payment->reference.'/approve');

        Notification::assertSentTo($payer, PaymentReviewed::class, fn ($n): bool => $n->approved === true
            && $n->reference === $payment->reference);
    }

    public function test_a_rejected_payment_notifies_with_the_reason(): void
    {
        Notification::fake();

        $admin = $this->admin();
        $payer = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $payer->id]);
        $payment = $this->charge($donation);

        app(PaymentManager::class)->submitForReview($payment);
        $this->actingAs($admin)->post('/admin/payments/'.$payment->reference.'/reject', [
            'note' => 'Nominal transfer tidak sesuai.',
        ]);

        Notification::assertSentTo($payer, PaymentReviewed::class, fn ($n): bool => $n->approved === false
            && $n->note === 'Nominal transfer tidak sesuai.');
    }

    public function test_a_guest_payment_is_skipped_rather_than_crashing(): void
    {
        $admin = $this->admin();
        $donation = Donation::factory()->guest()->create();
        $payment = $this->charge($donation);

        app(PaymentManager::class)->submitForReview($payment);

        // A guest donation has no user_id, so notifyPayer() must bail out.
        $this->actingAs($admin)
            ->post('/admin/payments/'.$payment->reference.'/approve')
            ->assertRedirect(route('admin.payments.index'))
            ->assertSessionHas('success');

        $this->assertTrue($payment->refresh()->isPaid());
    }

    public function test_the_webhook_still_settles_without_an_operator(): void
    {
        // A real provider is the trusted party; the review queue is for
        // the manual gateway, where nobody but a human can verify.
        $user = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $user->id]);
        $payment = $this->charge($donation);

        $this->postJson('/api/payments/webhook', [
            'reference' => $payment->reference,
            'status' => 'settlement',
            'amount' => (float) $payment->amount,
        ])->assertOk();

        $this->assertTrue($payment->refresh()->isPaid());
    }

    public function test_reconcile_is_a_safe_no_op_for_the_manual_gateway(): void
    {
        $user = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $user->id]);
        $this->charge($donation);

        $result = app(PaymentManager::class)->reconcile();

        $this->assertSame(1, $result['checked']);
        $this->assertSame(0, $result['applied'], 'The manual gateway has no remote state to poll.');
        $this->assertSame(1, $result['skipped']);
    }

    public function test_stale_summary_counts_what_needs_a_human(): void
    {
        $user = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $user->id]);

        app(PaymentManager::class)->submitForReview($this->charge($donation));
        Payment::factory()->expired()->create(['payable_type' => Donation::class, 'payable_id' => $donation->id]);

        $summary = app(PaymentManager::class)->staleSummary();

        $this->assertSame(1, $summary['awaiting_review']);
        $this->assertSame(1, $summary['expired_pending']);
        $this->assertSame(0, $summary['failed_today']);
    }

    public function test_reconcile_command_runs(): void
    {
        $this->artisan('payments:reconcile --summary')
            ->assertSuccessful();
    }

    private function admin(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }

    private function charge(Donation|Membership $payable, string $method = 'qris'): Payment
    {
        $amount = $payable instanceof Donation
            ? (float) $payable->amount
            : (float) $payable->tier->price;

        return Payment::factory()->create([
            'user_id' => $payable->user_id,
            'payable_type' => $payable::class,
            'payable_id' => $payable->getKey(),
            'amount' => $amount,
            'method' => $method,
        ]);
    }
}
