<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Limbah',
                'slug' => 'limbah',
                'description' => 'Strategies for reducing plastic waste and sustainable living.',
                'color' => 'secondary-container',
                'icon' => 'recycling',
            ],
            [
                'name' => 'Konservasi',
                'slug' => 'konservasi',
                'description' => 'Conservation of water and natural resources.',
                'color' => 'tertiary-container',
                'icon' => 'nature',
            ],
            [
                'name' => 'Penghijauan',
                'slug' => 'penghijauan',
                'description' => 'Urban greening and climate change mitigation.',
                'color' => 'primary-fixed',
                'icon' => 'park',
            ],
            [
                'name' => 'Hutan',
                'slug' => 'hutan',
                'description' => 'Rainforest protection and biodiversity.',
                'color' => 'secondary',
                'icon' => 'forest',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
