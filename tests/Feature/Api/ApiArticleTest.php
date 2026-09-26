<?php

namespace Tests\Feature\Api;

use App\Models\Article;
use App\Models\Category;
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
        Article::factory()->count(3)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status' => 'published',
        ]);

        $response = $this->getJson('/api/articles');
        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'title', 'slug', 'excerpt', 'content', 'featured_image', 'published_at', 'user', 'category'],
                ],
                'links',
                'meta',
            ])
            ->assertJsonCount(3, 'data');
    }

    public function test_drafts_are_hidden_from_the_public_listing(): void
    {
        Article::factory()->create(['status' => 'published']);
        Article::factory()->draft()->create();

        $this->getJson('/api/articles')
            ->assertOk()
            ->assertJsonCount(1, 'data');
    }

    public function test_listing_respects_per_page(): void
    {
        Article::factory()->count(5)->create();

        $this->getJson('/api/articles?per_page=2')
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonPath('meta.per_page', 2);
    }

    public function test_per_page_is_clamped_to_a_sane_range(): void
    {
        Article::factory()->create();

        $this->getJson('/api/articles?per_page=9999')
            ->assertOk()
            ->assertJsonPath('meta.per_page', 50);
    }

    public function test_can_get_single_article_via_api(): void
    {
        $article = Article::factory()->create(['status' => 'published']);

        $this->getJson('/api/articles/'.$article->id)
            ->assertOk()
            ->assertJsonPath('data.id', $article->id)
            ->assertJsonPath('data.title', $article->title)
            ->assertJsonPath('data.user.name', $article->user->name)
            ->assertJsonPath('data.category.id', $article->category_id);
    }

    public function test_draft_article_is_not_publicly_readable(): void
    {
        $article = Article::factory()->draft()->create();

        $this->getJson('/api/articles/'.$article->id)->assertNotFound();
    }

    public function test_author_can_read_their_own_draft_via_api(): void
    {
        $article = Article::factory()->draft()->create();

        $this->actingAs($article->user)
            ->getJson('/api/articles/'.$article->id)
            ->assertOk();
    }

    public function test_article_not_found_returns_404(): void
    {
        $this->getJson('/api/articles/999')->assertNotFound();
    }
}
