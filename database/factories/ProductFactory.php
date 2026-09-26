<?php

namespace Database\Factories;

use App\Models\AffiliateCategory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'affiliate_category_id' => AffiliateCategory::factory(),
            'name' => fake()->unique()->sentence(3),
            'description' => fake()->sentence(15),
            'price' => fake()->numberBetween(10_000, 2_000_000),
            'affiliate_link' => 'https://tokopedia.link/'.fake()->bothify('??????####'),
            'image_url' => null,
        ];
    }
}
