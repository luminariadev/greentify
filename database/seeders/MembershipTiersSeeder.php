<?php

namespace Database\Seeders;

use App\Models\MembershipTier;
use Illuminate\Database\Seeder;

class MembershipTiersSeeder extends Seeder
{
    /**
     * Seed the membership tiers with initial data.
     */
    public function run(): void
    {
        $tiers = [
            [
                'name' => 'Free',
                'slug' => 'free',
                'price' => 0,
                'description' => 'Akses dasar ke Greentify. Baca, komentar, dan buat 1 artikel/minggu.',
                'features' => [
                    'Baca artikel',
                    'Komentar artikel',
                    '1 artikel/minggu',
                ],
            ],
            [
                'name' => 'Green',
                'slug' => 'green',
                'price' => 25000,
                'description' => 'Untuk penulis aktif. Unlimited artikel, badge Green, dan dukungan komunitas.',
                'features' => [
                    'Semua fitur Free',
                    'Unlimited artikel',
                    '5 artikel/minggu',
                    'Badge Green',
                    'Dukungan komunitas',
                ],
            ],
            [
                'name' => 'Pro Green',
                'slug' => 'pro-green',
                'price' => 50000,
                'description' => 'Untuk profesional. Semua fitur Green + analitik artikel, tanpa iklan.',
                'features' => [
                    'Semua fitur Green',
                    'Analitik artikel',
                    'Tanpa iklan',
                    'Prioritas moderasi',
                ],
            ],
            [
                'name' => 'Community Leader',
                'slug' => 'community-leader',
                'price' => 100000,
                'description' => 'Untuk pemimpin komunitas. Semua fitur Pro Green + webinar eksklusif & mentorship.',
                'features' => [
                    'Semua fitur Pro Green',
                    'Webinar eksklusif',
                    'Mentorship',
                    'Badge Verified',
                ],
            ],
        ];

        foreach ($tiers as $tierData) {
            MembershipTier::firstOrCreate(['slug' => $tierData['slug']], $tierData);
        }
    }
}
