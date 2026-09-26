<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'article_id' => \App\Models\Article::factory(),
            'parent_id' => null,
            'body' => fake()->paragraph(),
        ];
    }

    public function reply(?Comment $parent = null): static
    {
        return $this->state(fn (array $attributes): array => [
            'article_id' => $parent?->article_id ?? \App\Models\Article::factory(),
            'parent_id' => $parent?->id,
        ]);
    }
}
