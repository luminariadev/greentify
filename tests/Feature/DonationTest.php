<?php

namespace Tests\Feature;

use App\Models\Donation;
use App\Models\User;
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

    public function test_guest_can_make_donation(): void
    {
        $response = $this->post('/donasi', [
            'amount' => 25000,
            'payment_method' => 'qris',
            'message' => 'Terima kasih!',
        ]);

        $response->assertRedirect(route('donation.index'));
        $this->assertDatabaseHas('donations', [
            'amount' => 25000,
            'status' => 'completed',
            'payment_method' => 'qris',
        ]);
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
}
