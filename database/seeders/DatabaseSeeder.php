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
        User::truncate(); // Menghapus seluruh data user sebelumnya (opsional)

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@sig.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'Rizky Anugrah',
            'email' => 'rizky@sig.com',
            'email_verified_at' => now(),
            'password' => Hash::make('rizky123'),
        ]);
    }
}