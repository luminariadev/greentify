<?php

namespace Tests\Feature;

use App\Models\Membership;
use App\Models\MembershipTier;
use App\Models\User;
use Database\Seeders\MembershipTiersSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MembershipTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(MembershipTiersSeeder::class);
    }

    public function test_membership_pricing_page_is_accessible(): void
    {
        $this->get('/membership/pricing')->assertOk();
    }

    public function test_pricing_page_lists_every_tier(): void
    {
        $this->get('/membership/pricing')
            ->assertOk()
            ->assertSee('Free')
            ->assertSee('Green')
            ->assertSee('Pro Green')
            ->assertSee('Community Leader');
    }

    public function test_membership_status_page_requires_auth(): void
    {
        $this->get('/membership')->assertRedirect('/login');
    }

    public function test_authenticated_user_can_view_membership_status(): void
    {
        $user = User::factory()->create();
        $tier = MembershipTier::where('slug', 'free')->firstOrFail();

        Membership::factory()->create([
            'user_id' => $user->id,
            'membership_tier_id' => $tier->id,
            'is_active' => true,
        ]);

        $this->actingAs($user)
            ->get('/membership')
            ->assertOk()
            ->assertSee('Free');
    }

    public function test_membership_tiers_are_seeded(): void
    {
        $this->assertDatabaseCount('membership_tiers', 4);
    }

    public function test_tier_names_match_expected(): void
    {
        $names = MembershipTier::pluck('name')->sort()->values()->all();

        $this->assertEquals(['Community Leader', 'Free', 'Green', 'Pro Green'], $names);
    }

    public function test_seeder_is_idempotent(): void
    {
        $this->seed(MembershipTiersSeeder::class);
        $this->seed(MembershipTiersSeeder::class);

        $this->assertDatabaseCount('membership_tiers', 4);
    }

    public function test_tier_prices_match_the_pricing_page(): void
    {
        $this->assertSame('25000.00', MembershipTier::where('slug', 'green')->firstOrFail()->price);
        $this->assertSame('50000.00', MembershipTier::where('slug', 'pro-green')->firstOrFail()->price);
        $this->assertSame('100000.00', MembershipTier::where('slug', 'community-leader')->firstOrFail()->price);
    }
}
