<?php

namespace Tests\Feature;

use App\Models\Donation;
use App\Models\Membership;
use App\Models\MembershipTier;
use App\Models\Payment;
use App\Models\User;
use App\Payments\Concerns\GatewayEvent;
use App\Payments\PaymentManager;
use Database\Seeders\MembershipTiersSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    public function test_paid_membership_is_inactive_until_payment_settles(): void
    {
        $this->seed(MembershipTiersSeeder::class);

        $user = User::factory()->create();
        $tier = MembershipTier::where('slug', 'green')->firstOrFail();

        $response = $this->actingAs($user)
            ->post('/membership/subscribe/'.$tier->id);

        $membership = Membership::latest('id')->firstOrFail();

        $this->assertFalse($membership->is_active, 'Membership must not be active before payment.');
        $this->assertDatabaseHas('payments', [
            'payable_type' => Membership::class,
            'payable_id' => $membership->id,
            'status' => Payment::STATUS_PENDING,
        ]);

        $response->assertRedirectContains('/payments/');
    }

    public function test_settling_a_membership_payment_activates_the_membership(): void
    {
        $this->seed(MembershipTiersSeeder::class);

        $user = User::factory()->create();
        $tier = MembershipTier::where('slug', 'pro-green')->firstOrFail();

        $this->actingAs($user)->post('/membership/subscribe/'.$tier->id);

        $membership = Membership::latest('id')->firstOrFail();
        $payment = $this->paymentFor($membership);

        app(PaymentManager::class)->apply(new GatewayEvent(
            payment: $payment,
            status: Payment::STATUS_PAID,
        ));

        $membership->refresh();

        $this->assertTrue($membership->is_active);
        $this->assertNotNull($membership->starts_at);
        $this->assertTrue($membership->expires_at->isAfter(now()));
    }

    public function test_free_tier_activates_without_a_payment(): void
    {
        $this->seed(MembershipTiersSeeder::class);

        $user = User::factory()->create();
        $free = MembershipTier::where('slug', 'free')->firstOrFail();

        $this->actingAs($user)->post('/membership/subscribe/'.$free->id);

        $membership = Membership::latest('id')->firstOrFail();

        $this->assertTrue($membership->is_active);
        $this->assertNull($membership->expires_at);
        $this->assertDatabaseMissing('payments', ['payable_id' => $membership->id]);
    }

    public function test_duplicate_webhook_does_not_extend_the_membership(): void
    {
        $this->seed(MembershipTiersSeeder::class);

        $user = User::factory()->create();
        $tier = MembershipTier::where('slug', 'green')->firstOrFail();

        $this->actingAs($user)->post('/membership/subscribe/'.$tier->id);

        $membership = Membership::latest('id')->firstOrFail();
        $payment = $this->paymentFor($membership);
        $manager = app(PaymentManager::class);

        $this->assertTrue($manager->apply(new GatewayEvent($payment, Payment::STATUS_PAID)));

        $firstExpiry = $membership->refresh()->expires_at;

        $this->assertFalse($manager->apply(new GatewayEvent($payment, Payment::STATUS_PAID)));
        $this->assertFalse($manager->apply(new GatewayEvent($payment, Payment::STATUS_PAID)));

        $this->assertTrue($firstExpiry->equalTo($membership->refresh()->expires_at));
    }

    public function test_webhook_settles_a_payment(): void
    {
        $user = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $user->id]);

        $payment = $this->charge($donation);

        $response = $this->postJson('/api/payments/webhook', [
            'reference' => $payment->reference,
            'status' => 'settlement',
            'amount' => (float) $payment->amount,
        ]);

        $response->assertOk();
        $this->assertTrue($payment->refresh()->isPaid());
        $this->assertSame('completed', $donation->refresh()->status);
    }

    public function test_webhook_rejects_an_amount_mismatch(): void
    {
        $user = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $user->id]);

        $payment = $this->charge($donation);

        $response = $this->postJson('/api/payments/webhook', [
            'reference' => $payment->reference,
            'status' => 'settlement',
            'amount' => 1.00, // not what was charged
        ]);

        $response->assertStatus(422);
        $this->assertFalse($payment->refresh()->isPaid());
    }

    public function test_webhook_returns_404_for_an_unknown_reference(): void
    {
        $this->postJson('/api/payments/webhook', [
            'reference' => 'GRN-DOES-NOT-EXIST',
            'status' => 'settlement',
        ])->assertNotFound();
    }

    public function test_webhook_ignores_an_unknown_status_without_failing(): void
    {
        $user = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $user->id]);
        $payment = $this->charge($donation);

        $this->postJson('/api/payments/webhook', [
            'reference' => $payment->reference,
            'status' => 'something_new_from_the_provider',
        ])->assertOk();

        $this->assertFalse($payment->refresh()->isPaid());
    }

    public function test_payment_page_requires_authentication(): void
    {
        $user = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $user->id]);
        $payment = $this->charge($donation);

        $this->get('/payments/'.$payment->reference)->assertRedirect('/login');
    }

    public function test_user_cannot_view_another_users_payment(): void
    {
        $owner = User::factory()->create();
        $intruder = User::factory()->create();

        $donation = Donation::factory()->create(['user_id' => $owner->id]);
        $payment = $this->charge($donation);

        $this->actingAs($intruder)
            ->get('/payments/'.$payment->reference)
            ->assertForbidden();
    }

    public function test_guest_receipt_requires_a_valid_signature(): void
    {
        $donation = Donation::factory()->guest()->create();
        $payment = $this->charge($donation);

        $this->get('/payments/guest/'.$payment->reference)->assertForbidden();
    }

    public function test_guest_receipt_renders_with_a_valid_signature(): void
    {
        $donation = Donation::factory()->guest()->create();
        $payment = $this->charge($donation);

        $url = URL::temporarySignedRoute(
            'payment.guest.receipt',
            now()->addHour(),
            ['reference' => $payment->reference],
        );

        $this->get($url)
            ->assertOk()
            ->assertSee($payment->reference);
    }

    public function test_confirming_queues_the_payment_and_pressing_twice_does_nothing(): void
    {
        $user = User::factory()->create();
        $donation = Donation::factory()->create(['user_id' => $user->id]);
        $payment = $this->charge($donation);

        $this->actingAs($user)
            ->post('/payments/'.$payment->reference.'/confirm')
            ->assertRedirect();

        // Confirming is a claim, not a settlement — see PaymentReviewTest
        // for the operator side. This assertion is the regression guard
        // for the self-settling bug fixed on 29 Sep 2026.
        $this->assertSame(Payment::STATUS_IN_REVIEW, $payment->refresh()->status);

        // Second press must not re-queue or reset the claim.
        $this->actingAs($user)
            ->post('/payments/'.$payment->reference.'/confirm')
            ->assertSessionHas('error');
    }

    public function test_cannot_confirm_a_something_else_users_payment(): void
    {
        $owner = User::factory()->create();
        $intruder = User::factory()->create();

        $donation = Donation::factory()->create(['user_id' => $owner->id]);
        $payment = $this->charge($donation);

        $this->actingAs($intruder)
            ->post('/payments/'.$payment->reference.'/confirm')
            ->assertForbidden();

        $this->assertFalse($payment->refresh()->isPaid());
    }

    public function test_pending_payment_past_expiry_reports_as_expired(): void
    {
        $payment = Payment::factory()->expired()->create();

        $this->assertTrue($payment->isPending());
        $this->assertSame(Payment::STATUS_EXPIRED, $payment->effectiveStatus());
    }

    public function test_payment_references_are_unique(): void
    {
        $first = Payment::factory()->create();
        $second = Payment::factory()->create();

        $this->assertNotSame($first->reference, $second->reference);
        $this->assertStringStartsWith('GRN-', $first->reference);
    }

    /**
     * Build a pending payment against a payable, the way
     * PaymentManager::charge() would, so a test can settle it directly.
     */
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

    private function paymentFor(Donation|Membership $payable): Payment
    {
        return Payment::where('payable_type', $payable::class)
            ->where('payable_id', $payable->getKey())
            ->latest('id')
            ->firstOrFail();
    }
}
