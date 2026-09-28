<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'reference' => 'GRN-TEST-'.Str::upper(Str::random(12)),
            'gateway' => 'manual',
            'amount' => fake()->randomElement([10000, 25000, 50000, 100000]),
            'currency' => 'IDR',
            'method' => fake()->randomElement(['qris', 'bank_transfer', 'ewallet']),
            'status' => Payment::STATUS_PENDING,
            'gateway_reference' => null,
            'instructions' => null,
            'payload' => null,
            'expires_at' => now()->addHours(24),
            'paid_at' => null,
            'failed_at' => null,
        ];
    }

    public function paid(): static
    {
        return $this->state(fn (): array => [
            'status' => Payment::STATUS_PAID,
            'paid_at' => now(),
        ]);
    }

    public function failed(): static
    {
        return $this->state(fn (): array => [
            'status' => Payment::STATUS_FAILED,
            'failed_at' => now(),
        ]);
    }

    public function expired(): static
    {
        return $this->state(fn (): array => [
            'expires_at' => now()->subMinute(),
        ]);
    }
}
