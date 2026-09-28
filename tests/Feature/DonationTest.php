<?php

namespace Tests\Feature;

use App\Models\Donation;
use App\Models\Payment;
use App\Payments\Concerns\GatewayEvent;
use App\Payments\PaymentManager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DonationTest extends TestCase
{
    use RefreshDatabase;

    public function test_donation_page_is_accessible(): void
    {
        $response = $this->get('/donasi');
        $response->assertOk();
    }

    public function test_donation_page_shows_total_raised(): void
    {
        Donation::create([
            'amount' => 50000,
            'status' => 'completed',
            'payment_method' => 'qris',
        ]);

        $response = $this->get('/donasi');
        $response->assertOk();
        $response->assertSee('50.000');
    }

    /**
     * A submitted donation is pending, not completed. Money has not moved
     * yet, so counting it as revenue would be a lie on the public page.
     */
    public function test_guest_donation_starts_pending_and_raises_a_payment(): void
    {
        $response = $this->post('/donasi', [
            'amount' => 25000,
            'payment_method' => 'qris',
            'message' => 'Terima kasih!',
        ]);

        $this->assertDatabaseHas('donations', [
            'amount' => 25000,
            'status' => 'pending',
            'payment_method' => 'qris',
        ]);

        $this->assertDatabaseHas('payments', [
            'status' => Payment::STATUS_PENDING,
            'method' => 'qris',
        ]);

        $response->assertRedirectContains('/payments/guest/');
    }

    public function test_pending_donation_is_not_counted_in_total_raised(): void
    {
        $this->post('/donasi', [
            'amount' => 75000,
            'payment_method' => 'bank_transfer',
        ]);

        // The public total must not include money that has not arrived.
        $this->get('/donasi')->assertOk()->assertDontSee('75.000');
    }

    public function test_donation_requires_valid_amount(): void
    {
        $response = $this->post('/donasi', [
            'amount' => 10, // terlalu kecil
            'payment_method' => 'qris',
        ]);

        $response->assertSessionHasErrors('amount');
    }

    public function test_donation_requires_valid_payment_method(): void
    {
        $response = $this->post('/donasi', [
            'amount' => 50000,
            'payment_method' => 'cash', // tidak valid
        ]);

        $response->assertSessionHasErrors('payment_method');
    }

    public function test_settling_the_payment_marks_the_donation_completed(): void
    {
        $this->post('/donasi', [
            'amount' => 30000,
            'payment_method' => 'ewallet',
        ]);

        $donation = Donation::latest('id')->firstOrFail();
        $payment = Payment::where('payable_type', Donation::class)
            ->where('payable_id', $donation->id)
            ->firstOrFail();

        app(PaymentManager::class)->apply(new GatewayEvent(
            payment: $payment,
            status: Payment::STATUS_PAID,
        ));

        $this->assertSame('completed', $donation->refresh()->status);
    }

    public function test_settled_donation_shows_in_total_raised(): void
    {
        $this->post('/donasi', [
            'amount' => 40000,
            'payment_method' => 'qris',
        ]);

        $donation = Donation::latest('id')->firstOrFail();
        $payment = Payment::where('payable_type', Donation::class)
            ->where('payable_id', $donation->id)
            ->firstOrFail();

        app(PaymentManager::class)->apply(new GatewayEvent(
            payment: $payment,
            status: Payment::STATUS_PAID,
        ));

        $this->get('/donasi')->assertOk()->assertSee('40.000');
    }
}
