<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Use DB queries to seed core users to avoid Eloquent model global scopes during early seeding
        DB::table('users')->updateOrInsert([
            'email' => 'test@motac.gov.my',
        ], [
            'name' => 'Test User',
            'identification_number' => 'TEST-' . Str::upper(Str::random(8)),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'status' => 'aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->updateOrInsert([
            'email' => 'filament_admin@motac.gov.my',
        ], [
            'name' => 'Filament Admin',
            'password' => bcrypt('Password123!'),
            'identification_number' => 'ADMIN001',
            'status' => 'aktif',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->updateOrInsert([
            'email' => 'izzatfirdaus@motac.gov.my',
        ], [
            'name' => 'Izzat Firdaus',
            'password' => bcrypt('Motac.123$'),
            'identification_number' => 'ADMIN000',
            'status' => 'aktif',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
