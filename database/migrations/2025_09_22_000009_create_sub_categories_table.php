<?php

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
    public function up(): void
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->foreignId('equipment_category_id')->nullable()->constrained('equipment_categories')->nullOnDelete()->comment('FK to equipment_categories');
            $table->string('name')->unique()->comment('Sub-category name, unique');
            $table->text('description')->nullable()->comment('Description');
            $table->boolean('is_active')->default(true)->index()->comment('Active status');
            // Audit columns
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (creator)');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (updater)');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (deleter)');
            $table->timestampsTz(0);
            $table->softDeletesTz(0);
            $table->comment('Stores sub-categories linked to equipment categories for ICTServe (iServe).');
        });
    }

    public function down(): void
    {
        // Drop FKs before table for safe rollback
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->dropForeign(['equipment_category_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
            $table->dropForeign(['deleted_by']);
        });
        Schema::dropIfExists('sub_categories');
    }
};
