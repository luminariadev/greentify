<?php

namespace Tests\Feature;

use App\Models\AffiliateCategory;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MarketplaceTest extends TestCase
{
    use RefreshDatabase;

    public function test_marketplace_index_page_is_accessible(): void
    {
        $response = $this->get('/marketplace');
        $response->assertOk();
    }

    public function test_marketplace_shows_products(): void
    {
        $category = AffiliateCategory::factory()->create();
        Product::factory()->create(['affiliate_category_id' => $category->id]);

        $response = $this->get('/marketplace');
        $response->assertOk();
        $response->assertSee('Product Title'); // Assuming factory creates this title
    }

    public function test_marketplace_product_detail_page_is_accessible(): void
    {
        $product = Product::factory()->create();

        $response = $this->get("/marketplace/" . $product->slug);
        $response->assertOk();
        $response->assertSee($product->title);
    }

    public function test_marketplace_can_filter_by_category(): void
    {
        $category1 = AffiliateCategory::factory()->create(['name' => 'Electronics']);
        $category2 = AffiliateCategory::factory()->create(['name' => 'Books']);
        Product::factory()->create(['affiliate_category_id' => $category1->id, 'title' => 'Laptop']);
        Product::factory()->create(['affiliate_category_id' => $category2->id, 'title' => 'Novel']);

        $response = $this->get('/marketplace?category=' . $category1->slug);
        $response->assertOk();
        $response->assertSee('Laptop');
        $response->assertDontSee('Novel');
    }
}
