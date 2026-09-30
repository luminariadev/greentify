<?php

namespace Tests\Feature;

use App\Models\Donation;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * The scheduled half of the manual payment gateway.
 *
 * Two things were missing while the roadmap called them done:
 *
 *  1. `payments:reconcile` existed as a command but was never registered
 *     in the scheduler, so nothing ever ran it.
 *  2. Nothing ever moved a payment from `pending` to `expired`.
 *     Payment::effectiveStatus() computed the answer on the fly for the
 *     view, but the row kept saying `pending` forever — so a payer whose
 *     QR had been dead for a week could still press "I have transferred",
 *     and reconcile() kept polling rows that would never settle.
 */
class PaymentExpiryTest extends TestCase
{
    use RefreshDatabase;

    // ------------------------------------------------------------------
    // 1. The command is actually scheduled
    // ------------------------------------------------------------------

    public function test_reconcile_is_registered_in_the_scheduler(): void
    {
        $events = collect(app(Schedule::class)->events())
            ->filter(fn ($event) => str_contains($event->command ?? '', 'payments:reconcile'));

        $this->assertNotEmpty(
            $events,
            'payments:reconcile is never scheduled, so the roadmap\'s '
            .'"run it every 5 minutes" item was a sentence and not code.',
        );
    }

    public function test_reconcile_runs_every_five_minutes(): void
    {
        $event = collect(app(Schedule::class)->events())
            ->first(fn ($event) => str_contains($event->command ?? '', 'payments:reconcile'));

        $this->assertNotNull($event);
        $this->assertSame(
            '*/5 * * * *',
            $event->expression,
            'The roadmap says every 5 minutes, which is cron */5, not every minute.',
        );
    }

    // ------------------------------------------------------------------
    // 2. A stale payment is actually marked expired in the database
    // ------------------------------------------------------------------

    public function test_marking_a_stale_payment_expired_persists_the_status(): void
    {
        $payment = $this->stalePayment();

        $this->assertTrue($payment->markExpired());
        $this->assertSame(Payment::STATUS_EXPIRED, $payment->refresh()->status);
    }

    public function test_marking_expired_is_idempotent(): void
    {
        $payment = $this->stalePayment();

        $this->assertTrue($payment->markExpired());
        $this->assertFalse($payment->markExpired(), 'A second call must be a no-op.');
    }

    public function test_a_payment_inside_its_window_cannot_be_expired(): void
    {
        $payment = $this->freshPayment();

        $this->assertFalse($payment->markExpired());
        $this->assertSame(Payment::STATUS_PENDING, $payment->refresh()->status);
    }

    public function test_a_payment_awaiting_operator_review_keeps_its_status(): void
    {
        // The money may well have landed — that is exactly what the
        // operator is being asked to look at. Expiry must not overwrite it.
        $payment = $this->stalePayment();
        $payment->forceFill(['status' => Payment::STATUS_IN_REVIEW, 'submitted_at' => now()])->save();

        $this->assertFalse($payment->refresh()->markExpired());
        $this->assertSame(Payment::STATUS_IN_REVIEW, $payment->refresh()->status);
    }

    public function test_a_settled_payment_is_never_expired(): void
    {
        $payment = $this->stalePayment();
        $payment->markPaid();

        $this->assertFalse($payment->refresh()->markExpired());
        $this->assertSame(Payment::STATUS_PAID, $payment->refresh()->status);
    }

    // ------------------------------------------------------------------
    // 3. The sweeper command exists and does the work
    // ------------------------------------------------------------------

    public function test_expire_stale_payments_command_sweeps_the_dead_rows(): void
    {
        $stale = $this->stalePayment();
        $inReview = $this->stalePayment();
        $inReview->forceFill(['status' => Payment::STATUS_IN_REVIEW, 'submitted_at' => now()])->save();
        $fresh = $this->freshPayment();

        Artisan::call('payments:expire-stale');
        $output = Artisan::output();

        $this->assertSame(Payment::STATUS_EXPIRED, $stale->refresh()->status);
        $this->assertSame(Payment::STATUS_PENDING, $fresh->refresh()->status);
        $this->assertSame(
            Payment::STATUS_IN_REVIEW,
            $inReview->refresh()->status,
            'A claimed payment is the operator\'s problem, not the sweeper\'s.',
        );
        $this->assertStringContainsString('1', $output);
    }

    // ------------------------------------------------------------------
    // 4. A payer cannot claim a payment that already expired
    // ------------------------------------------------------------------

    public function test_a_payer_cannot_claim_a_payment_that_expired(): void
    {
        $user = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $user->id]);
        $payment = $this->charge($donation);
        $payment->forceFill(['expires_at' => now()->subDay()])->save();

        $response = $this->actingAs($user)
            ->post('/payments/'.$payment->reference.'/confirm');

        $response->assertRedirectContains('/payments/'.$payment->reference);
        $this->assertSame(Payment::STATUS_PENDING, $payment->refresh()->status);
        $this->assertNull(
            $payment->refresh()->submitted_at,
            'An expired payment must not reach the operator queue.',
        );
    }

    public function test_the_payer_sees_why_their_claim_was_refused(): void
    {
        $user = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $user->id]);
        $payment = $this->charge($donation);
        $payment->forceFill(['expires_at' => now()->subDay()])->save();

        $this->actingAs($user)
            ->post('/payments/'.$payment->reference.'/confirm')
            ->assertSessionHas('error');
    }

    // ------------------------------------------------------------------
    // Helpers
    // ------------------------------------------------------------------

    private function stalePayment(): Payment
    {
        $payment = $this->charge(Donation::factory()->create());
        $payment->forceFill(['expires_at' => now()->subMinute()])->save();

        return $payment->refresh();
    }

    private function freshPayment(): Payment
    {
        return $this->charge(Donation::factory()->create());
    }

    private function charge(Donation $donation): Payment
    {
        $payment = new Payment([
            'user_id' => $donation->user_id,
            'payable_type' => $donation->getMorphClass(),
            'payable_id' => $donation->id,
            'amount' => $donation->amount,
            'currency' => 'IDR',
            'method' => 'bank_transfer',
            'status' => Payment::STATUS_PENDING,
            'expires_at' => now()->addDay(),
        ]);
        $payment->save();

        return $payment;
    }
}
