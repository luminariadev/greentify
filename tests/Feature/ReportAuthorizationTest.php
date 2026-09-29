<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Report;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

/**
 * ReportController gated its two admin surfaces on a hardcoded email
 * comparison:
 *
 *     abort_unless(auth()->check() && auth()->user()->email === 'admin@greentify.id', 403);
 *
 * The users table has had a `role` column since 2026-08-10, User has
 * isAdmin()/isStaff(), and the `admin` middleware alias checks that role
 * properly. So the role system existed and this controller ignored it, with
 * two consequences:
 *
 *   1. A real admin whose address is not admin@greentify.id (created via
 *      factory, promoted in the database, or registered with a different
 *      address) gets 403 on the report queue.
 *   2. Anybody who registers admin@greentify.id — the address the seeder
 *      creates for a *content author* — becomes the report admin, because
 *      ArticleSeeder::firstOrCreate() provisions that address with no role
 *      at all, and /register has `unique:users` so the first person to
 *      claim it on a fresh install owns the report queue.
 *
 * These tests pin the role-based behaviour and specifically assert that an
 * admin-role user with a different address is let in, and that the seeder's
 * content author is not.
 */
class ReportAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_admin_role_user_with_any_address_can_open_the_report_queue(): void
    {
        $admin = User::factory()->admin()->create(['email' => 'chief@greentify.id']);

        $this->actingAs($admin)->get('/reports')->assertOk();
    }

    public function test_a_moderator_can_open_the_report_queue(): void
    {
        // isStaff() covers moderators everywhere else in the app, so the
        // report queue should not be the one place they are locked out.
        $moderator = User::factory()->moderator()->create();

        $this->actingAs($moderator)->get('/reports')->assertOk();
    }

    public function test_an_ordinary_user_is_refused_the_report_queue(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/reports')->assertForbidden();
    }

    public function test_an_anonymous_visitor_is_refused_the_report_queue(): void
    {
        $this->get('/reports')->assertRedirect(route('login'));
    }

    public function test_the_seeder_content_author_is_not_the_report_admin(): void
    {
        // ArticleSeeder provisions admin@greentify.id as an article author
        // with no explicit role. Matching on that address made the seeded
        // author the report administrator by accident.
        $author = User::factory()->create([
            'email' => 'admin@greentify.id',
            'role' => User::ROLE_USER,
        ]);

        $this->actingAs($author)->get('/reports')->assertForbidden();
    }

    public function test_an_admin_can_review_a_report(): void
    {
        $admin = User::factory()->admin()->create();
        $reporter = User::factory()->create();
        $author = User::factory()->create();
        $article = Article::factory()->create(['user_id' => $author->id]);

        $report = Report::create([
            'reporter_id' => $reporter->id,
            'reportable_type' => Article::class,
            'reportable_id' => $article->id,
            'reason' => 'spam',
            'description' => 'Konten mencurigakan',
        ]);

        $this->actingAs($admin)
            ->patch(route('reports.review', $report), ['status' => 'reviewed'])
            ->assertRedirect();

        $this->assertDatabaseHas('reports', [
            'id' => $report->id,
            'status' => 'reviewed',
            'reviewed_by' => $admin->id,
        ]);
    }

    public function test_an_ordinary_user_cannot_review_a_report(): void
    {
        $user = User::factory()->create();
        $reporter = User::factory()->create();
        $author = User::factory()->create();
        $article = Article::factory()->create(['user_id' => $author->id]);

        $report = Report::create([
            'reporter_id' => $reporter->id,
            'reportable_type' => Article::class,
            'reportable_id' => $article->id,
            'reason' => 'spam',
        ]);

        $this->actingAs($user)
            ->patch(route('reports.review', $report), ['status' => 'dismissed'])
            ->assertForbidden();

        $this->assertDatabaseHas('reports', ['id' => $report->id, 'status' => 'pending']);
    }

    public function test_reporting_your_own_content_is_refused(): void
    {
        $author = User::factory()->create();
        $article = Article::factory()->create(['user_id' => $author->id]);

        $this->actingAs($author)->post('/reports', [
            'reportable_type' => Article::class,
            'reportable_id' => $article->id,
            'reason' => 'spam',
        ])->assertSessionHas('error');

        $this->assertDatabaseCount('reports', 0);
    }

    public function test_reporting_someone_elses_content_records_the_report(): void
    {
        Notification::fake();

        $reporter = User::factory()->create();
        $author = User::factory()->create();
        $article = Article::factory()->create(['user_id' => $author->id]);

        $this->actingAs($reporter)->post('/reports', [
            'reportable_type' => Article::class,
            'reportable_id' => $article->id,
            'reason' => 'spam',
            'description' => 'Iklan mencurigakan',
        ])->assertSessionHas('success');

        $this->assertDatabaseHas('reports', [
            'reporter_id' => $reporter->id,
            'reportable_type' => Article::class,
            'reportable_id' => $article->id,
            'status' => 'pending',
        ]);
    }

    public function test_a_comment_can_also_be_reported(): void
    {
        $reporter = User::factory()->create();
        $commenter = User::factory()->create();
        $article = Article::factory()->create(['user_id' => User::factory()->create()->id]);

        $comment = Comment::factory()->create([
            'user_id' => $commenter->id,
            'article_id' => $article->id,
        ]);

        $this->actingAs($reporter)->post('/reports', [
            'reportable_type' => Comment::class,
            'reportable_id' => $comment->id,
            'reason' => 'hate_speech',
        ])->assertSessionHas('success');

        $this->assertDatabaseHas('reports', [
            'reporter_id' => $reporter->id,
            'reportable_type' => Comment::class,
            'reportable_id' => $comment->id,
        ]);
    }

    public function test_an_arbitrary_class_cannot_be_reported(): void
    {
        $reporter = User::factory()->create();

        // reportable_type is validated as 'required|string' only, so without
        // the allowlist this would resolve an arbitrary model class.
        $this->actingAs($reporter)->post('/reports', [
            'reportable_type' => \App\Models\User::class,
            'reportable_id' => $reporter->id,
            'reason' => 'spam',
        ])->assertStatus(422);

        $this->assertDatabaseCount('reports', 0);
    }

    public function test_an_invalid_reason_is_rejected(): void
    {
        $reporter = User::factory()->create();
        $author = User::factory()->create();
        $article = Article::factory()->create(['user_id' => $author->id]);

        $this->actingAs($reporter)->post('/reports', [
            'reportable_type' => Article::class,
            'reportable_id' => $article->id,
            'reason' => 'because-i-said-so',
        ])->assertSessionHasErrors('reason');

        $this->assertDatabaseCount('reports', 0);
    }

    public function test_the_create_form_rejects_an_unknown_reportable_type(): void
    {
        $this->actingAs(User::factory()->create())
            ->get('/reports/create?type='.urlencode(\App\Models\User::class).'&id=1')
            ->assertNotFound();
    }
}
