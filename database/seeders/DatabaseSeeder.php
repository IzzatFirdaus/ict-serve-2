<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create or update test user for general testing (idempotent)
        User::updateOrCreate([
            'email' => 'test@motac.gov.my',
        ], [
            'name' => 'Test User',
            'identification_number' => 'TEST-' . Str::upper(Str::random(8)),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);


        // Create or update Filament admin user for admin panel access (idempotent)
        User::updateOrCreate([
            'email' => 'filament_admin@motac.gov.my',
        ], [
            'name' => 'Filament Admin',
            'password' => bcrypt('Password123!'),
            'identification_number' => 'ADMIN001',
            'status' => 'aktif',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // Create or update Izzat Firdaus user (idempotent)
        User::updateOrCreate([
            'email' => 'izzatfirdaus@motac.gov.my',
        ], [
            'name' => 'Izzat Firdaus',
            'password' => bcrypt('Motac.123$'),
            'identification_number' => 'ADMIN000',
            'status' => 'aktif',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
