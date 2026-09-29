<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

/**
 * Before this suite, exactly one route in the whole application was
 * rate limited: the payment confirm, as a literal `throttle:10,1`. Login,
 * registration, comments, reports, the contact form and the newsletter were
 * all open, so a single client could mass-create accounts, flood the admin's
 * notifications, or use the contact form as a mail relay.
 *
 * These tests drive each limiter past its budget and assert the 429. A test
 * that only asserts "the route still works" would pass whether or not the
 * limiter is wired up at all.
 */
class RateLimitTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Each test starts with a clean limiter state; without this a test
        // that exhausts 'write' would silently throttle the next one.
        RateLimiter::clear('login');
        RateLimiter::clear('register');
        RateLimiter::clear('write');
        RateLimiter::clear('public-submit');
        RateLimiter::clear('report');
    }

    /**
     * The named limiters must actually exist. A `throttle:login` string on a
     * route with no matching RateLimiter::for() is a runtime error the first
     * time somebody hits it in production.
     */
    public function test_every_named_limiter_referenced_by_a_route_is_registered(): void
    {
        $referenced = [];

        foreach (app('router')->getRoutes() as $route) {
            foreach ($route->gatherMiddleware() as $middleware) {
                if (is_string($middleware) && str_starts_with($middleware, 'throttle:')) {
                    $referenced[] = substr($middleware, strlen('throttle:'));
                }
            }
        }

        $this->assertNotEmpty($referenced, 'expected at least one throttled route');

        foreach (array_unique($referenced) as $limiter) {
            $this->assertNotNull(
                RateLimiter::limiter($limiter),
                "route references throttle:{$limiter} but no RateLimiter::for() declares it",
            );
        }
    }

    public function test_repeated_failed_logins_are_throttled(): void
    {
        // 5 attempts per 5 minutes per email+IP, so the 6th is blocked.
        for ($i = 0; $i < 5; $i++) {
            $this->post('/login', [
                'email' => 'target@example.com',
                'password' => 'wrong-password',
            ]);
        }

        $response = $this->post('/login', [
            'email' => 'target@example.com',
            'password' => 'wrong-password',
        ]);

        $response->assertStatus(429);
    }

    public function test_the_login_limit_is_per_account_not_per_ip(): void
    {
        // Exhaust the budget for one account...
        for ($i = 0; $i < 5; $i++) {
            $this->post('/login', ['email' => 'noisy@example.com', 'password' => 'wrong']);
        }
        $this->post('/login', ['email' => 'noisy@example.com', 'password' => 'wrong'])
            ->assertStatus(429);

        // ...and a different account from the same IP is unaffected. An
        // IP-only limit would lock out an entire office after a few typos.
        $response = $this->post('/login', [
            'email' => 'someone-else@example.com',
            'password' => 'wrong',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors('email');
    }

    public function test_registration_is_throttled_per_ip(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $this->post('/register', [
                'name' => "Spammer {$i}",
                'email' => "spammer{$i}@example.com",
                'password' => 'password123',
                'password_confirmation' => 'password123',
            ]);
        }

        $this->post('/register', [
            'name' => 'Spammer 6',
            'email' => 'spammer6@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])->assertStatus(429);

        $this->assertDatabaseMissing('users', ['email' => 'spammer6@example.com']);
    }

    public function test_the_contact_form_is_throttled(): void
    {
        for ($i = 0; $i < 3; $i++) {
            $this->post('/contact', [
                'name' => 'Spam',
                'email' => "spam{$i}@example.com",
                'message' => 'Buy my thing',
            ]);
        }

        $this->post('/contact', [
            'name' => 'Spam',
            'email' => 'spam4@example.com',
            'message' => 'Buy my thing',
        ])->assertStatus(429);

        $this->assertDatabaseMissing('pesan', ['email' => 'spam4@example.com']);
    }

    public function test_newsletter_subscribe_is_throttled(): void
    {
        for ($i = 0; $i < 3; $i++) {
            $this->post('/newsletter/subscribe', ['email' => "victim{$i}@example.com"]);
        }

        $this->post('/newsletter/subscribe', ['email' => 'victim4@example.com'])
            ->assertStatus(429);

        $this->assertDatabaseMissing('subscribers', ['email' => 'victim4@example.com']);
    }

    public function test_commenting_is_throttled(): void
    {
        $user = User::factory()->create();
        $article = Article::factory()->create();

        for ($i = 0; $i < 30; $i++) {
            $this->actingAs($user)->post(route('comments.store', $article), [
                'body' => "Komentar spam nomor {$i}",
            ]);
        }

        $this->actingAs($user)->post(route('comments.store', $article), [
            'body' => 'Komentar yang harus ditolak',
        ])->assertStatus(429);

        $this->assertDatabaseMissing('comments', ['body' => 'Komentar yang harus ditolak']);
    }

    public function test_reports_are_throttled_so_the_admin_inbox_survives(): void
    {
        $reporter = User::factory()->create();
        $owner = User::factory()->create();
        $victim = User::factory()->create();
        $article = Article::factory()->create(['user_id' => $owner->id]);

        for ($i = 0; $i < 10; $i++) {
            $this->actingAs($reporter)->post('/reports', [
                'reportable_type' => \App\Models\Article::class,
                'reportable_id' => $article->id,
                'reason' => 'spam',
                'description' => "Laporan spam {$i}",
            ]);
        }

        $this->actingAs($reporter)->post('/reports', [
            'reportable_type' => \App\Models\Article::class,
            'reportable_id' => $article->id,
            'reason' => 'spam',
            'description' => 'Laporan yang harus ditolak',
        ])->assertStatus(429);

        $this->assertDatabaseMissing('reports', ['description' => 'Laporan yang harus ditolak']);
    }

    public function test_one_user_exhausting_the_write_budget_does_not_throttle_another(): void
    {
        $article = Article::factory()->create();
        $noisy = User::factory()->create();
        $quiet = User::factory()->create();

        for ($i = 0; $i < 30; $i++) {
            $this->actingAs($noisy)->post(route('comments.store', $article), [
                'body' => "Spam {$i}",
            ]);
        }

        $this->actingAs($noisy)->post(route('comments.store', $article), ['body' => 'Ditolak'])
            ->assertStatus(429);

        $response = $this->actingAs($quiet)->post(route('comments.store', $article), [
            'body' => 'Komentar asli dari pengguna lain',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('comments', ['body' => 'Komentar asli dari pengguna lain']);
    }

    public function test_payments_confirm_keeps_its_rate_limit(): void
    {
        $user = User::factory()->create();

        for ($i = 0; $i < 10; $i++) {
            $this->actingAs($user)->post('/payments/REF-0001/confirm');
        }

        $this->actingAs($user)->post('/payments/REF-0001/confirm')
            ->assertStatus(429);
    }

    public function test_throttling_does_not_break_ordinary_browsing(): void
    {
        // The read surface must stay untouched by any of this: a limiter
        // applied too broadly would 429 a normal reader.
        Article::factory()->create();
        User::factory()->create();

        $this->get('/')->assertOk();
        $this->get('/blogspot')->assertOk();
        $this->get('/marketplace')->assertOk();
        $this->get(route('blogspot'))->assertOk();
    }
}
