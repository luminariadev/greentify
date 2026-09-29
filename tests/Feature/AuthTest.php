<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * AuthController::login redirected to '/welcome' on success. No route has
 * ever defined that path -- the landing page is the root, and 'welcome' is a
 * route *name*, not a URL. So every successful web login landed the user on
 * a 404, with a comment in the source admitting the line was never finished.
 *
 * `redirect()->intended()` is also the wrong shape here: it silently
 * discards the intended destination when there is none, which is what let
 * the placeholder survive. A named route cannot be silently wrong -- route()
 * throws at render time if the name is missing.
 */
class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_login_page_is_reachable(): void
    {
        $this->get('/login')->assertOk();
    }

    public function test_the_registration_page_is_reachable(): void
    {
        $this->get('/register')->assertOk();
    }

    public function test_successful_login_lands_on_a_real_url(): void
    {
        $user = User::factory()->create(['password' => 'password123']);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $response->assertRedirect();
        $this->assertTrue($response->isRedirect(), 'login must redirect');
        $this->assertAuthenticatedAs($user);

        // Follow the redirect. Before the fix this is a 404.
        $this->get($response->headers->get('Location'))->assertOk();
    }

    public function test_the_login_redirect_target_is_the_named_landing_route(): void
    {
        $user = User::factory()->create(['password' => 'password123']);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('welcome'));
    }

    public function test_a_user_interrupted_mid_flow_returns_to_where_they_were(): void
    {
        $user = User::factory()->create(['password' => 'password123']);
        $article = Article::factory()->create();

        // Visit an auth-gated page, so Laravel records it as the intended
        // destination, then log in.
        $this->get('/my-articles')->assertRedirect(route('login'));

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('articles.my'));
    }

    public function test_failed_login_does_not_authenticate(): void
    {
        $user = User::factory()->create(['password' => 'password123']);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_registration_creates_an_account_and_redirects_to_a_real_url(): void
    {
        $response = $this->post('/register', [
            'name' => 'K|Sepanjang Jalan',
            'email' => 'sepanjang@example.com',
            'password' => 'rahasia12345',
            'password_confirmation' => 'rahasia12345',
        ]);

        $response->assertRedirect(route('welcome'));
        $this->assertDatabaseHas('users', ['email' => 'sepanjang@example.com']);
        $this->get($response->headers->get('Location'))->assertOk();
    }

    public function test_registration_rejects_a_weak_password(): void
    {
        $this->post('/register', [
            'name' => 'Pendek',
            'email' => 'pendek@example.com',
            'password' => 'short',
            'password_confirmation' => 'short',
        ])->assertSessionHasErrors('password');

        $this->assertDatabaseMissing('users', ['email' => 'pendek@example.com']);
    }

    public function test_registration_rejects_a_duplicate_email(): void
    {
        User::factory()->create(['email' => 'ada@example.com']);

        $this->post('/register', [
            'name' => 'Duplikat',
            'email' => 'ada@example.com',
            'password' => 'rahasia12345',
            'password_confirmation' => 'rahasia12345',
        ])->assertSessionHasErrors('email');

        $this->assertSame(1, User::where('email', 'ada@example.com')->count());
    }

    public function test_logout_ends_the_session(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post('/logout')->assertRedirect(route('login'));
        $this->assertGuest();
    }

    public function test_auth_gated_pages_redirect_anonymous_visitors_to_login(): void
    {
        $this->get('/my-articles')->assertRedirect(route('login'));
        $this->get('/notifications')->assertRedirect(route('login'));
        $this->get('/bookmarks')->assertRedirect(route('login'));
    }

    public function test_the_session_id_rotates_on_login(): void
    {
        // Session fixation guard: without regenerate() an attacker who
        // planted a session id keeps it after the victim authenticates.
        $user = User::factory()->create(['password' => 'password123']);

        $this->get('/login');
        $before = session()->getId();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $this->assertNotSame($before, session()->getId());
    }

    public function test_an_unknown_category_is_rejected_rather_than_crashing(): void
    {
        // Guards the write path: an invalid category_id must not 500.
        $user = User::factory()->create();
        Category::factory()->create();

        $this->actingAs($user)->post('/articles', [
            'title' => 'Artikel dengan kategori palsu',
            'category_id' => 999999,
            'content' => 'Konten.',
            'status' => 'draft',
        ])->assertSessionHasErrors('category_id');
    }
}
