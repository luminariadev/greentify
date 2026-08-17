<?php

namespace Tests\Feature;

use App\Models\Membership;
use App\Models\MembershipTier;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MembershipTest extends TestCase
{
    use RefreshDatabase;

    public function test_membership_pricing_page_is_accessible(): void
    {
        $response = $this->get('/membership/pricing');
        $response->assertOk();
    }

    public function test_membership_status_page_requires_auth(): void
    {
        $response = $this->get('/membership');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_view_membership_status(): void
    {
        $user = User::factory()->create();
        $tier = MembershipTier::factory()->create(['name' => 'Free', 'price' => 0]);
        Membership::factory()->create(['user_id' => $user->id, 'membership_tier_id' => $tier->id, 'is_active' => true]);

        $response = $this->actingAs($user)->get('/membership');
        $response->assertOk();
        $response->assertSee('Free');
    }

    public function test_membership_tiers_are_seeded(): void
    {
        $this->assertDatabaseCount('membership_tiers', 4);
    }

    public function test_tier_names_match_expected(): void
    {
        $names = MembershipTier::pluck('name')->sort()->toArray();
        $this->assertEquals(['Community Leader', 'Free', 'Green', 'Pro Green'], $names);
    }
}