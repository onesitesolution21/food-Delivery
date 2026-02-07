<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the categories table.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
                'status' => 1,
            ],
            [
                'name' => 'Clothing',
                'slug' => 'clothing',
                'status' => 1,
            ],
            [
                'name' => 'Books',
                'slug' => 'books',
                'status' => 1,
            ],
            [
                'name' => 'Home & Kitchen',
                'slug' => 'home-kitchen',
                'status' => 1,
            ],
            [
                'name' => 'Sports & Outdoors',
                'slug' => 'sports-outdoors',
                'status' => 1,
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
