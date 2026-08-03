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

        // Optional: add sample likes/bookmarks for demonstration
        // $this->seedInteractions();

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
                $sampleLikes = $articles->random(3);
                $sampleBookmarks = $articles->random(2);
                $user->likes()->syncWithoutDetaching($sampleLikes->pluck('id')->toArray());
                $user->bookmarks()->syncWithoutDetaching($sampleBookmarks->pluck('id')->toArray());
            }
        }
    }
}
