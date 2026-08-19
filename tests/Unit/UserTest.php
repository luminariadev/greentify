<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_default_role_is_user(): void
    {
        $user = User::factory()->create();
        $this->assertEquals('user', $user->role);
        $this->assertFalse($user->isAdmin());
        $this->assertFalse($user->isModerator());
    }

    public function test_is_admin_returns_true_for_admin_role(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->assertTrue($admin->isAdmin());
        $this->assertFalse($admin->isModerator());
    }

    public function test_is_moderator_returns_true_for_moderator_role(): void
    {
        $moderator = User::factory()->create(['role' => 'moderator']);
        $this->assertTrue($moderator->isModerator());
        $this->assertFalse($moderator->isAdmin());
    }

    public function test_user_can_have_followers(): void
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        $userA->following()->attach($userB);

        $this->assertCount(1, $userA->following);
        $this->assertCount(1, $userB->followers);
    }
}
