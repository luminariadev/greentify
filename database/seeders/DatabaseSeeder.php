<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(MembershipTiersSeeder::class);
        $this->call(AffiliateMarketplaceSeeder::class);
        $this->call(AdsAndSponsoredSeeder::class);

        User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => bcrypt('password')]
        );
    }

    protected function seedInteractions(): void
    {
        $users = User::all();
        $articles = Article::all();
        if ($users->isNotEmpty() && $articles->isNotEmpty()) {
            foreach ($users as $user) {
                $user->likes()->syncWithoutDetaching($articles->random(3)->pluck('id')->all());
                $user->bookmarks()->syncWithoutDetaching($articles->random(2)->pluck('id')->all());
            }
        }
    }
}
