<?php

namespace Database\Seeders;

use App\Models\AffiliateCategory;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AffiliateMarketplaceSeeder extends Seeder
{
    /**
     * Seed the affiliate marketplace with initial categories and products.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Tumbler & Botol Minum', 'slug' => 'tumbler-botol-minum'],
            ['name' => 'Tas Belanja Ramah Lingkungan', 'slug' => 'tas-belanja'],
            ['name' => 'Skincare Natural & Organik', 'slug' => 'skincare-natural'],
            ['name' => 'Tanaman Hias & Kebun', 'slug' => 'tanaman-hias'],
            ['name' => 'Panel Surya Rumah Tangga', 'slug' => 'panel-surya'],
        ];

        foreach ($categories as $cat) {
            AffiliateCategory::firstOrCreate($cat);
        }

        $tumbler = AffiliateCategory::where('slug', 'tumbler-botol-minum')->first();
        $tas = AffiliateCategory::where('slug', 'tas-belanja')->first();
        $skincare = AffiliateCategory::where('slug', 'skincare-natural')->first();
        $tanaman = AffiliateCategory::where('slug', 'tanaman-hias')->first();
        $surya = AffiliateCategory::where('slug', 'panel-surya')->first();

        $products = [
            [
                'name' => 'Tumbler Stainless 500ml',
                'description' => 'Botol minum stainless steel anti bocor, bebas BPA, menjaga minuman tetap dingin 12 jam.',
                'price' => 89000,
                'affiliate_link' => 'https://tokopedia.com/affiliate/tumbler-stainless-500ml',
                'image_url' => 'https://images.example.com/tumbler-500ml.jpg',
                'affiliate_category_id' => $tumbler->id,
            ],
            [
                'name' => 'Tas Belanja Lipat Eco',
                'description' => 'Tas belanja ramah lingkungan, bisa dilipat kecil, kapasitas 20L, kuat dan tahan lama.',
                'price' => 25000,
                'affiliate_link' => 'https://shopee.co.id/affiliate/tas-belanja-lipat-eco',
                'image_url' => 'https://images.example.com/tas-lipat-eco.jpg',
                'affiliate_category_id' => $tas->id,
            ],
            [
                'name' => 'Serum Vitamin C Organik',
                'description' => 'Serum wajah dari bahan organik alami, mencerahkan dan melembapkan kulit.',
                'price' => 125000,
                'affiliate_link' => 'https://tokopedia.com/affiliate/serum-vitamin-c-organik',
                'image_url' => 'https://images.example.com/serum-vitc.jpg',
                'affiliate_category_id' => $skincare->id,
            ],
            [
                'name' => 'Paket Tanaman Hias Monstera',
                'description' => 'Tanaman hias Monstera Deliciosa dalam pot, mudah dirawat, menyegarkan ruangan.',
                'price' => 75000,
                'affiliate_link' => 'https://shopee.co.id/affiliate/monstera-deliciosa',
                'image_url' => 'https://images.example.com/monstera.jpg',
                'affiliate_category_id' => $tanaman->id,
            ],
            [
                'name' => 'Solar Panel 100W Portable',
                'description' => 'Panel surya portabel 100W, cocok untuk camping, menghemat listrik rumah tangga.',
                'price' => 1500000,
                'affiliate_link' => 'https://tokopedia.com/affiliate/solar-panel-100w',
                'image_url' => 'https://images.example.com/solar-panel-100w.jpg',
                'affiliate_category_id' => $surya->id,
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(['name' => $product['name']], $product);
        }
    }
}
