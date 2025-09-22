<?php
<<<<<<< HEAD:database/migrations/2025_09_22_000006_create_sub_categories_table.php
=======

/**
 * Migration for sub_categories table.
 * Stores sub-categories linked to equipment categories for ICTServe (iServe).
 * Follows Laravel 12 conventions and best practices.
 */
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe)):database/migrations/2025_09_22_000009_create_sub_categories_table.php

/**
 * Migration for sub_categories table.
 * Stores sub-categories linked to equipment categories for ICTServe (iServe).
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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipment_category_id')->nullable()->constrained('equipment_categories')->nullOnDelete();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
            $table->comment('Stores sub-categories linked to equipment categories for ICTServe (iServe).');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
