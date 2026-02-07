<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the orders table.
     */
    public function run(): void
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return;
        }

        $orders = [
            [
                'user_id' => $users->first()->id,
                'firstname' => 'John',
                'lastname' => 'Doe',
                'address' => '123 Main Street Apt 4B',
                'city' => 'New York',
                'country' => 'United States',
                'postcode' => '10001',
                'phone' => '+1 (555) 123-4567',
                'email' => 'john@example.com',
                'ordernotes' => 'Please deliver after 3 PM',
                'order_status' => 'completed',
                'total_amount' => 299.97,
                'payment_method' => 'credit_card',
                'state' => 'NY',
            ],
            [
                'user_id' => $users->first()->id,
                'firstname' => 'Jane',
                'lastname' => 'Smith',
                'address' => '456 Oak Avenue Suite 200',
                'city' => 'Los Angeles',
                'country' => 'United States',
                'postcode' => '90001',
                'phone' => '+1 (555) 987-6543',
                'email' => 'jane@example.com',
                'ordernotes' => 'Handle with care',
                'order_status' => 'processing',
                'total_amount' => 199.98,
                'payment_method' => 'paypal',
                'state' => 'CA',
            ],
            [
                'user_id' => $users->first()->id,
                'firstname' => 'Michael',
                'lastname' => 'Johnson',
                'address' => '789 Pine Road',
                'city' => 'Chicago',
                'country' => 'United States',
                'postcode' => '60601',
                'phone' => '+1 (555) 246-8135',
                'email' => 'michael@example.com',
                'ordernotes' => null,
                'order_status' => 'pending',
                'total_amount' => 79.99,
                'payment_method' => 'debit_card',
                'state' => 'IL',
            ],
            [
                'user_id' => $users->first()->id,
                'firstname' => 'Sarah',
                'lastname' => 'Williams',
                'address' => '321 Elm Street',
                'city' => 'Houston',
                'country' => 'United States',
                'postcode' => '77001',
                'phone' => '+1 (555) 369-2580',
                'email' => 'sarah@example.com',
                'ordernotes' => 'Gift wrapping requested',
                'order_status' => 'completed',
                'total_amount' => 449.95,
                'payment_method' => 'credit_card',
                'state' => 'TX',
            ],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
