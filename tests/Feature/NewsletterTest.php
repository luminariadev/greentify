<?php

namespace Tests\Feature;

use App\Models\Subscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsletterTest extends TestCase
{
    use RefreshDatabase;

    public function test_newsletter_subscribe_route_accepts_valid_email(): void
    {
        $response = $this->post('/newsletter/subscribe', ['email' => 'test@example.com']);
        $response->assertRedirect();
        $this->assertDatabaseHas('subscribers', ['email' => 'test@example.com', 'is_active' => true]);
    }

    public function test_newsletter_subscribe_route_rejects_invalid_email(): void
    {
        $response = $this->post('/newsletter/subscribe', ['email' => 'not-an-email']);
        $response->assertSessionHasErrors('email');
    }

    public function test_unsubscribe_page_displays_form(): void
    {
        $response = $this->get('/newsletter/unsubscribe');
        $response->assertOk();
        $response->assertSee('Unsubscribe');
    }

    public function test_unsubscribe_process_deactivates_subscriber(): void
    {
        $subscriber = Subscriber::factory()->create(['email' => 'old@example.com', 'is_active' => true]);
        $response = $this->post('/newsletter/unsubscribe', ['email' => 'old@example.com']);
        $response->assertRedirect();
        $this->assertDatabaseHas('subscribers', ['email' => 'old@example.com', 'is_active' => false]);
    }
}
