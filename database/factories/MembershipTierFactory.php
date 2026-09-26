<?php

namespace Database\Factories;

use App\Models\MembershipTier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MembershipTier>
 */
class MembershipTierFactory extends Factory
{
    protected $model = MembershipTier::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->randomElement(['Bronze', 'Silver', 'Gold', 'Platinum']);

        return [
            'name' => $name,
            'slug' => fake()->unique()->slug(2),
            'price' => fake()->numberBetween(0, 500_000),
            'description' => fake()->sentence(10),
            'features' => [fake()->word(), fake()->word()],
        ];
    }
}
