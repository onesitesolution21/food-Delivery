<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the order items table.
     */
    public function run(): void
    {
        $orders = Order::all();
        $products = Product::all();
        $users = User::all();

        if ($orders->isEmpty() || $products->isEmpty() || $users->isEmpty()) {
            return;
        }

        $orderItems = [
            // Order 1 items
            [
                'order_id' => $orders[0]->id,
                'user_id' => $users[0]->id,
                'product_id' => $products[0]->id, // Wireless Headphones
                'quantity' => 1,
                'price' => 79.99,
                'total_amount' => 79.99,
            ],
            [
                'order_id' => $orders[0]->id,
                'user_id' => $users[0]->id,
                'product_id' => $products[1]->id, // Smart Watch
                'quantity' => 1,
                'price' => 199.99,
                'total_amount' => 199.99,
            ],
            [
                'order_id' => $orders[0]->id,
                'user_id' => $users[0]->id,
                'product_id' => $products[2]->id, // USB-C Cable
                'quantity' => 2,
                'price' => 12.99,
                'total_amount' => 25.98,
            ],
            // Order 2 items
            [
                'order_id' => $orders[1]->id,
                'user_id' => $users[0]->id,
                'product_id' => $products[3]->id, // Cotton T-Shirt
                'quantity' => 3,
                'price' => 24.99,
                'total_amount' => 74.97,
            ],
            [
                'order_id' => $orders[1]->id,
                'user_id' => $users[0]->id,
                'product_id' => $products[4]->id, // Denim Jeans
                'quantity' => 1,
                'price' => 59.99,
                'total_amount' => 59.99,
            ],
            [
                'order_id' => $orders[1]->id,
                'user_id' => $users[0]->id,
                'product_id' => $products[5]->id, // The Lean Startup
                'quantity' => 1,
                'price' => 29.99,
                'total_amount' => 29.99,
            ],
            // Order 3 items
            [
                'order_id' => $orders[2]->id,
                'user_id' => $users[0]->id,
                'product_id' => $products[8]->id, // Coffee Maker
                'quantity' => 1,
                'price' => 49.99,
                'total_amount' => 49.99,
            ],
            [
                'order_id' => $orders[2]->id,
                'user_id' => $users[0]->id,
                'product_id' => $products[2]->id, // USB-C Cable
                'quantity' => 1,
                'price' => 12.99,
                'total_amount' => 12.99,
            ],
            // Order 4 items
            [
                'order_id' => $orders[3]->id,
                'user_id' => $users[0]->id,
                'product_id' => $products[9]->id, // Yoga Mat
                'quantity' => 2,
                'price' => 34.99,
                'total_amount' => 69.98,
            ],
            [
                'order_id' => $orders[3]->id,
                'user_id' => $users[0]->id,
                'product_id' => $products[10]->id, // Running Shoes
                'quantity' => 1,
                'price' => 99.99,
                'total_amount' => 99.99,
            ],
            [
                'order_id' => $orders[3]->id,
                'user_id' => $users[0]->id,
                'product_id' => $products[6]->id, // Clean Code
                'quantity' => 1,
                'price' => 39.99,
                'total_amount' => 39.99,
            ],
            [
                'order_id' => $orders[3]->id,
                'user_id' => $users[0]->id,
                'product_id' => $products[7]->id, // Stainless Steel Knife Set
                'quantity' => 1,
                'price' => 89.99,
                'total_amount' => 89.99,
            ],
        ];

        foreach ($orderItems as $orderItem) {
            OrderItem::create($orderItem);
        }
    }
}
