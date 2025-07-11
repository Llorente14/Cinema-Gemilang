<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin123',
            'email' => 'admin@cinema.gemilang',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role' => UserRole::Admin,
        ]);

        // Customer
        User::create([
            'name' => 'Fabio',
            'email' => 'fab@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => UserRole::Customer,
        ]);

        //Membuat 10 Customer berbeda
        User::factory()->count(10)->create();
    }
}
