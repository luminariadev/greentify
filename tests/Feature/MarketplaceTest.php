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
        $this->get('/marketplace')->assertOk();
    }

    public function test_marketplace_shows_products(): void
    {
        $category = AffiliateCategory::factory()->create();
        $product = Product::factory()->create([
            'affiliate_category_id' => $category->id,
            'name' => 'Product Title',
        ]);

        $this->get('/marketplace')
            ->assertOk()
            ->assertSee($product->name)
            ->assertSee(e($product->name));
    }

    public function test_marketplace_product_detail_page_is_accessible(): void
    {
        $product = Product::factory()->create();

        $this->get('/marketplace/'.$product->id)
            ->assertOk()
            ->assertSee(e($product->name));
    }

    public function test_marketplace_can_filter_by_category(): void
    {
        $electronics = AffiliateCategory::factory()->create(['name' => 'Electronics', 'slug' => 'electronics']);
        $books = AffiliateCategory::factory()->create(['name' => 'Books', 'slug' => 'books']);

        Product::factory()->create(['affiliate_category_id' => $electronics->id, 'name' => 'Laptop']);
        Product::factory()->create(['affiliate_category_id' => $books->id, 'name' => 'Novel']);

        $this->get('/marketplace?category=electronics')
            ->assertOk()
            ->assertSee('Laptop')
            ->assertDontSee('Novel');
    }

    public function test_marketplace_can_search_by_name(): void
    {
        $category = AffiliateCategory::factory()->create();
        Product::factory()->create(['affiliate_category_id' => $category->id, 'name' => 'Bamboo Toothbrush']);
        Product::factory()->create(['affiliate_category_id' => $category->id, 'name' => 'Reusable Bag']);

        $this->get('/marketplace?search=Bamboo')
            ->assertOk()
            ->assertSee('Bamboo Toothbrush')
            ->assertDontSee('Reusable Bag');
    }

    public function test_empty_marketplace_shows_the_empty_state(): void
    {
        $this->get('/marketplace')
            ->assertOk()
            ->assertSee('Produk belum tersedia');
    }

    public function test_products_without_a_category_still_render(): void
    {
        Product::factory()->create(['affiliate_category_id' => null, 'name' => 'Uncategorised Item']);

        $this->get('/marketplace')
            ->assertOk()
            ->assertSee('Uncategorised Item');
    }
}
