<?php

namespace Tests\Unit;

use App\Models\Donation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DonationTest extends TestCase
{
    use RefreshDatabase;

    public function test_completed_scope_only_returns_completed_donations(): void
    {
        Donation::create(['amount' => 10000, 'status' => 'completed', 'payment_method' => 'qris']);
        Donation::create(['amount' => 20000, 'status' => 'pending', 'payment_method' => 'qris']);
        Donation::create(['amount' => 30000, 'status' => 'failed', 'payment_method' => 'bank_transfer']);

        $completed = Donation::completed()->get();

        $this->assertCount(1, $completed);
        $this->assertEquals(10000, $completed->first()->amount);
    }

    public function test_sum_of_completed_donations(): void
    {
        Donation::create(['amount' => 10000, 'status' => 'completed', 'payment_method' => 'qris']);
        Donation::create(['amount' => 50000, 'status' => 'completed', 'payment_method' => 'qris']);
        Donation::create(['amount' => 99999, 'status' => 'pending', 'payment_method' => 'qris']);

        $this->assertEquals(60000, Donation::completed()->sum('amount'));
    }

    public function test_donation_belongs_to_user(): void
    {
        $donation = Donation::create([
            'amount' => 5000,
            'status' => 'completed',
            'payment_method' => 'ewallet',
        ]);

        $this->assertNull($donation->user); // user_id nullable
    }
}
