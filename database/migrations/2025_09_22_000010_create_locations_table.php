<?php
<<<<<<< HEAD:database/migrations/2025_09_22_000007_create_locations_table.php
=======

/**
 * Migration for locations table.
 * Stores physical locations for equipment and loan operations.
 * Follows Laravel 12 conventions and best practices.
 */
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe)):database/migrations/2025_09_22_000010_create_locations_table.php

/**
 * Migration for locations table.
 * Stores physical locations for equipment and loan operations.
 * Follows Laravel 12 conventions and best practices.
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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
            $table->comment('Stores physical locations for equipment and loan operations.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
