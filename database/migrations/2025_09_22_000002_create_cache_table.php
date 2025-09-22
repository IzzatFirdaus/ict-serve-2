<?php
<<<<<<< HEAD:database/migrations/0001_01_01_000001_create_cache_table.php
=======

/**
 * Migration: Create cache and cache_locks tables for Laravel cache system.
 * Follows Laravel 12 conventions for database cache driver and distributed locks.
 */
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe)):database/migrations/2025_09_22_000002_create_cache_table.php

/**
 * Migration: Create cache and cache_locks tables for Laravel cache system.
 * Follows Laravel 12 conventions for database cache driver and distributed locks.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
