<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence(4);

        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $title,
            'slug' => Str::slug($title).'-'.fake()->unique()->numberBetween(1, 99999),
            'excerpt' => fake()->sentence(20),
            'content' => fake()->paragraphs(3, true),
            'featured_image' => null,
            'status' => 'published',
            'published_at' => now()->subDays(fake()->numberBetween(0, 90)),
        ];
    }

    /**
     * A draft article: hidden from public listings until published.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => 'draft',
            'published_at' => null,
        ]);
    }

    public function archived(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => 'archived',
        ]);
    }
}
