<?php

namespace Tests\Feature\Api;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_all_categories(): void
    {
        foreach (Category::factory()->count(5)->create() as $category) {
            Article::factory()->create(['category_id' => $category->id, 'status' => 'published']);
        }

        $this->getJson('/api/categories')
            ->assertOk()
            ->assertJsonCount(5, 'data')
            ->assertJsonPath('data.0.articles_count', 1);
    }

    public function test_categories_without_published_articles_are_omitted(): void
    {
        Category::factory()->create();

        $this->getJson('/api/categories')->assertOk()->assertJsonCount(0, 'data');
    }

    public function test_can_get_single_category(): void
    {
        $category = Category::factory()->create();

        $this->getJson('/api/categories/'.$category->id)
            ->assertOk()
            ->assertJsonPath('data.id', $category->id)
            ->assertJsonPath('data.name', $category->name);
    }

    public function test_category_not_found_returns_404(): void
    {
        $this->getJson('/api/categories/999')->assertNotFound();
    }
}
