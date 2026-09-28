<?php

namespace Database\Factories;

use App\Models\Donation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    protected $model = Donation::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'amount' => fake()->randomElement([10000, 25000, 50000, 100000, 250000]),
            'currency' => 'IDR',
            'message' => fake()->boolean(50) ? fake()->sentence(8) : null,
            'payment_method' => fake()->randomElement(['qris', 'bank_transfer', 'ewallet']),
            'status' => Donation::STATUS_PENDING,
            'reference' => 'DON-'.Str::upper(Str::random(10)),
        ];
    }

    public function completed(): static
    {
        return $this->state(fn (): array => [
            'status' => Donation::STATUS_COMPLETED,
        ]);
    }

    public function guest(): static
    {
        return $this->state(fn (): array => [
            'user_id' => null,
        ]);
    }
}
