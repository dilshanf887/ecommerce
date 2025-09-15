<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'is_special_customer' => false
        ]);
        
        // Special discount user
        User::create([
            'name' => 'User 1',
            'email' => 'user1@user.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
            'is_special_customer' => true
        ]);
        
        // Normal user
        User::create([
            'name' => 'User 2',
            'email' => 'user2@user.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
            'is_special_customer' => false
        ]);
    }
}
