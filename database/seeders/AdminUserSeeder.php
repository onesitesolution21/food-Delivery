<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the admin user.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@shop.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'test@shop.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
            ]
        );
    }
}
