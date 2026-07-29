<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat satu akun admin default
        User::create([
            'name' => 'Admin SMKN 11',
            'email' => 'admin@smkn11.com',
            'password' => Hash::make('password123'), // Password akan dienkripsi
            'role' => 'admin',
        ]);
    }
}
