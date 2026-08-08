<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\SponsoredPost;
use Illuminate\Database\Seeder;

class AdsAndSponsoredSeeder extends Seeder
{
    /**
     * Seed sample ads and sponsored posts.
     */
    public function run(): void
    {
        // Sample ads
        $ads = [
            [
                'title' => 'Brand Hijau — Banner Utama',
                'image_url' => 'https://images.example.com/banner-hijau.png',
                'link_url' => 'https://example.com/green-brand',
                'position' => 'banner_top',
                'is_active' => true,
            ],
            [
                'title' => 'Eco Store — Sidebar',
                'image_url' => 'https://images.example.com/eco-store.png',
                'link_url' => 'https://example.com/eco-store',
                'position' => 'sidebar',
                'is_active' => true,
            ],
            [
                'title' => 'Solar Energy — Bottom',
                'image_url' => 'https://images.example.com/solar-energy.png',
                'link_url' => 'https://example.com/solar-energy',
                'position' => 'banner_bottom',
                'is_active' => true,
            ],
        ];

        foreach ($ads as $ad) {
            Ad::firstOrCreate(['title' => $ad['title']], $ad);
        }

        // Sample sponsored post
        SponsoredPost::firstOrCreate(
            ['slug' => 'sponsored-eco-friendly-lifestyle'],
            [
                'title' => 'Mengenal Gaya Hidup Ramah Lingkungan',
                'slug' => 'sponsored-eco-friendly-lifestyle',
                'content' => 'Artikel bersponsor tentang gaya hidup ramah lingkungan dan produk-produk pendukungnya...',
                'sponsor_name' => 'Eco Living Indonesia',
                'sponsor_link' => 'https://example.com/eco-living',
                'is_published' => true,
                'published_at' => now(),
            ]
        );
    }
}
