<?php

namespace Tests\Feature\Api;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_all_categories(): void
    {
        Category::factory()->count(5)->create();

        $response = $this->getJson('/api/categories');
        $response->assertOk()
            ->assertJsonCount(5);
    }

    public function test_can_get_single_category(): void
    {
        $category = Category::factory()->create();
        $response = $this->getJson('/api/categories/' . $category->id);
        $response->assertOk()
            ->assertJson(['id' => $category->id, 'name' => $category->name]);
    }

    public function test_category_not_found_returns_404(): void
    {
        $response = $this->getJson('/api/categories/999');
        $response->assertNotFound();
    }
}
