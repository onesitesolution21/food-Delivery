<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the products table.
     */
    public function run(): void
    {
        $products = [
            // Electronics
            [
                'name' => 'Wireless Headphones',
                'slug' => 'wireless-headphones',
                'price' => 79.99,
                'quantity' => 50,
                'sku' => 'WH-001',
                'description' => 'High-quality wireless headphones with noise cancellation',
                'description_notes' => 'Features: Bluetooth 5.0, 30-hour battery life, Active noise cancellation',
                'category_id' => null, // Will be set below
                'status' => 'active',
            ],
            [
                'name' => 'Smart Watch',
                'slug' => 'smart-watch',
                'price' => 199.99,
                'quantity' => 30,
                'sku' => 'SW-001',
                'description' => 'Advanced smartwatch with fitness tracking',
                'description_notes' => 'Features: Heart rate monitor, Sleep tracking, Water resistant',
                'category_id' => null,
                'status' => 'active',
            ],
            [
                'name' => 'USB-C Cable',
                'slug' => 'usb-c-cable',
                'price' => 12.99,
                'quantity' => 200,
                'sku' => 'UC-001',
                'description' => 'Durable USB-C charging cable',
                'description_notes' => 'Features: Fast charging, 2 meter length, Durable braided design',
                'category_id' => null,
                'status' => 'active',
            ],
            // Clothing
            [
                'name' => 'Cotton T-Shirt',
                'slug' => 'cotton-t-shirt',
                'price' => 24.99,
                'quantity' => 100,
                'sku' => 'CT-001',
                'description' => 'Premium cotton t-shirt for everyday wear',
                'description_notes' => 'Features: 100% organic cotton, Machine washable, Available in multiple colors',
                'category_id' => null,
                'status' => 'active',
            ],
            [
                'name' => 'Denim Jeans',
                'slug' => 'denim-jeans',
                'price' => 59.99,
                'quantity' => 75,
                'sku' => 'DJ-001',
                'description' => 'Classic denim jeans perfect for any occasion',
                'description_notes' => 'Features: Stretch denim, Classic fit, Multiple size options',
                'category_id' => null,
                'status' => 'active',
            ],
            // Books
            [
                'name' => 'The Lean Startup',
                'slug' => 'the-lean-startup',
                'price' => 29.99,
                'quantity' => 40,
                'sku' => 'BK-001',
                'description' => 'How today\'s entrepreneurs use continuous innovation',
                'description_notes' => 'Author: Eric Ries, Pages: 336, Published: 2011',
                'category_id' => null,
                'status' => 'active',
            ],
            [
                'name' => 'Clean Code',
                'slug' => 'clean-code',
                'price' => 39.99,
                'quantity' => 35,
                'sku' => 'BK-002',
                'description' => 'A Handbook of Agile Software Craftsmanship',
                'description_notes' => 'Author: Robert C. Martin, Pages: 464, Published: 2008',
                'category_id' => null,
                'status' => 'active',
            ],
            // Home & Kitchen
            [
                'name' => 'Stainless Steel Knife Set',
                'slug' => 'stainless-steel-knife-set',
                'price' => 89.99,
                'quantity' => 25,
                'sku' => 'HK-001',
                'description' => 'Professional knife set for your kitchen',
                'description_notes' => 'Features: 6-piece set, Ergonomic handles, Dishwasher safe',
                'category_id' => null,
                'status' => 'active',
            ],
            [
                'name' => 'Coffee Maker',
                'slug' => 'coffee-maker',
                'price' => 49.99,
                'quantity' => 45,
                'sku' => 'HK-002',
                'description' => 'Programmable coffee maker with thermal carafe',
                'description_notes' => 'Features: Programmable timer, 12-cup capacity, Auto shutoff',
                'category_id' => null,
                'status' => 'active',
            ],
            // Sports & Outdoors
            [
                'name' => 'Yoga Mat',
                'slug' => 'yoga-mat',
                'price' => 34.99,
                'quantity' => 60,
                'sku' => 'SO-001',
                'description' => 'Non-slip yoga mat for comfortable workouts',
                'description_notes' => 'Features: TPE material, Non-slip surface, 6mm thickness',
                'category_id' => null,
                'status' => 'active',
            ],
            [
                'name' => 'Running Shoes',
                'slug' => 'running-shoes',
                'price' => 99.99,
                'quantity' => 55,
                'sku' => 'SO-002',
                'description' => 'High-performance running shoes',
                'description_notes' => 'Features: Cushioned sole, Breathable mesh, Multiple sizes',
                'category_id' => null,
                'status' => 'active',
            ],
        ];

        $categoryMap = [
            'Wireless Headphones' => 'electronics',
            'Smart Watch' => 'electronics',
            'USB-C Cable' => 'electronics',
            'Cotton T-Shirt' => 'clothing',
            'Denim Jeans' => 'clothing',
            'The Lean Startup' => 'books',
            'Clean Code' => 'books',
            'Stainless Steel Knife Set' => 'home-kitchen',
            'Coffee Maker' => 'home-kitchen',
            'Yoga Mat' => 'sports-outdoors',
            'Running Shoes' => 'sports-outdoors',
        ];

        foreach ($products as $product) {
            $product['category_id'] = Category::where('slug', $categoryMap[$product['name']])->first()?->id;
            
            Product::firstOrCreate(
                ['slug' => $product['slug']],
                $product
            );
        }
    }
}
