<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * The article write flow had a redirect target that no route defined.
 *
 * `ArticleController` redirected to route('articles.index') after create,
 * update and destroy, and both the create and edit forms linked to it too.
 * The public list is named 'blogspot'. Nothing asserts on the redirect
 * target, so 101 green tests sat on top of a route that does not exist:
 * every successful article write 500'd on the redirect and both form pages
 * threw on render.
 *
 * These tests assert the redirect target and that the form pages render, so
 * a renamed or removed route breaks the suite instead of production.
 */
class ArticleTest extends TestCase
{
    use RefreshDatabase;

    private function writer(): User
    {
        return User::factory()->create();
    }

    public function test_article_list_is_reachable_at_the_name_controllers_redirect_to(): void
    {
        // The name every redirect and cancel button uses. If this route is
        // renamed, this test names the new breakage in the failure message.
        $this->get(route('blogspot'))->assertOk();
    }

    public function test_creating_an_article_redirects_to_a_route_that_exists(): void
    {
        $user = $this->writer();
        $category = Category::factory()->create();

        $response = $this->actingAs($user)->post('/articles', [
            'title' => 'Menanam Pohon di Musim Hujan',
            'category_id' => $category->id,
            'content' => 'Konten artikel yang cukup panjang untuk validasi.',
            'status' => 'published',
        ]);

        $response->assertRedirect(route('blogspot'));
        $this->assertDatabaseHas('articles', [
            'user_id' => $user->id,
            'title' => 'Menanam Pohon di Musim Hujan',
        ]);
    }

    public function test_updating_an_article_redirects_to_a_route_that_exists(): void
    {
        $user = $this->writer();
        $article = Article::factory()->create(['user_id' => $user->id]);
        $category = Category::factory()->create();

        $response = $this->actingAs($user)->put(route('articles.update', $article), [
            'title' => 'Judul yang Diperbarui',
            'category_id' => $category->id,
            'content' => 'Konten artikel yang sudah diperbarui.',
            'status' => 'published',
        ]);

        $response->assertRedirect(route('blogspot'));
        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'title' => 'Judul yang Diperbarui',
        ]);
    }

    public function test_deleting_an_article_redirects_to_a_route_that_exists(): void
    {
        $user = $this->writer();
        $article = Article::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete(route('articles.destroy', $article));

        $response->assertRedirect(route('blogspot'));
        $this->assertDatabaseMissing('articles', ['id' => $article->id]);
    }

    public function test_create_form_renders_without_throwing_on_the_cancel_link(): void
    {
        $user = $this->writer();
        Category::factory()->create();

        $this->actingAs($user)->get('/articles/create')->assertOk();
    }

    public function test_edit_form_renders_without_throwing_on_the_cancel_link(): void
    {
        $user = $this->writer();
        $article = Article::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user)->get(route('articles.edit', $article))->assertOk();
    }

    public function test_a_non_author_cannot_open_the_edit_form(): void
    {
        $owner = User::factory()->create();
        $stranger = User::factory()->create();
        $article = Article::factory()->create(['user_id' => $owner->id]);

        $this->actingAs($stranger)->get(route('articles.edit', $article))->assertForbidden();
    }

    public function test_a_non_author_cannot_delete_the_article(): void
    {
        $owner = User::factory()->create();
        $stranger = User::factory()->create();
        $article = Article::factory()->create(['user_id' => $owner->id]);

        $this->actingAs($stranger)
            ->delete(route('articles.destroy', $article))
            ->assertForbidden();

        $this->assertDatabaseHas('articles', ['id' => $article->id]);
    }

    public function test_draft_articles_are_hidden_from_the_public_list(): void
    {
        $draft = Article::factory()->draft()->create();

        $this->get('/blogspot')->assertDontSee($draft->title);
    }

    public function test_the_author_can_still_preview_their_own_draft(): void
    {
        $draft = Article::factory()->draft()->create();

        $this->actingAs($draft->user)
            ->get(route('articles.show', $draft))
            ->assertOk();
    }

    public function test_a_stranger_cannot_read_someone_elses_draft(): void
    {
        $draft = Article::factory()->draft()->create();
        $stranger = User::factory()->create();

        $this->actingAs($stranger)
            ->get(route('articles.show', $draft))
            ->assertNotFound();
    }
}
