<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the positions table.
 * Stores job positions and links to grades.
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->string('name')->comment('Position name');
            $table->foreignId('grade_id')->nullable()->constrained('grades')->nullOnDelete()->comment('FK to grades');
            $table->text('description')->nullable()->comment('Description');
            $table->boolean('is_active')->default(true)->index()->comment('Active status');
            // Audit columns
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (creator)');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (updater)');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (deleter)');
            $table->timestampsTz(0);
            $table->softDeletesTz(0);
            $table->comment('Job positions for users, linked to grades.');
        });
    }

    public function down(): void
    {
        // Drop FKs before table for safe rollback
        Schema::table('positions', function (Blueprint $table) {
            $table->dropForeign(['grade_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
            $table->dropForeign(['deleted_by']);
        });
        Schema::dropIfExists('positions');
    }
};
