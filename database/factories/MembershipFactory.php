<?php

namespace Database\Factories;

use App\Models\Membership;
use App\Models\MembershipTier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Membership>
 */
class MembershipFactory extends Factory
{
    protected $model = Membership::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $starts = now()->subDays(fake()->numberBetween(1, 60));

        return [
            'user_id' => User::factory(),
            'membership_tier_id' => MembershipTier::factory(),
            'starts_at' => $starts,
            'expires_at' => $starts->copy()->addYear(),
            'is_active' => true,
        ];
    }

    public function expired(): static
    {
        return $this->state(fn (array $attributes): array => [
            'starts_at' => now()->subYear(),
            'expires_at' => now()->subMonth(),
        ]);
    }

    public function cancelled(): static
    {
        return $this->state(fn (array $attributes): array => [
            'is_active' => false,
        ]);
    }
}
