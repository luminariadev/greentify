<?php

namespace Tests\Feature\Api;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_list_of_articles_via_api(): void
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        Article::factory()->count(3)->create(['user_id' => $user->id, 'category_id' => $category->id]);

        $response = $this->getJson('/api/articles');
        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'title', 'slug', 'excerpt', 'body', 'image', 'published_at', 'user', 'category', 'tags']
                ],
                'links',
                'meta',
            ])
            ->assertJsonCount(3, 'data');
    }

    public function test_can_get_single_article_via_api(): void
    {
        $article = Article::factory()->create();

        $response = $this->getJson('/api/articles/' . $article->id);
        $response->assertOk()
            ->assertJson(['id' => $article->id, 'title' => $article->title]);
    }

    public function test_article_not_found_returns_404(): void
    {
        $response = $this->getJson('/api/articles/999');
        $response->assertNotFound();
    }
}
