<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Limbah',
            'Konservasi',
            'Penghijauan',
            'Hutan',
            'Air Bersih',
            'Energi Hijau',
            'Komposting',
            'Daur Ulang',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name).'-'.fake()->unique()->numberBetween(1, 9999),
            'description' => fake()->sentence(12),
            'color' => fake()->randomElement(['primary-container', 'secondary-container', 'tertiary-container']),
            'icon' => fake()->randomElement(['eco', 'recycling', 'nature', 'forest', 'water']),
        ];
    }
}
