<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the departments table.
 * Stores all departments/branches for user organization structure.
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->string('name')->comment('Department or branch name');
            $table->enum('branch_type', ['ibu_pejabat', 'pejabat_negeri', 'unit'])->index()->comment('Type: ibu_pejabat, pejabat_negeri, unit');
            $table->string('code')->unique()->comment('Unique department code');
            $table->text('description')->nullable()->comment('Description');
            $table->boolean('is_active')->default(true)->index()->comment('Active status');
            $table->foreignId('head_user_id')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (head of department)');
            // Audit columns
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (creator)');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (updater)');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (deleter)');
            $table->timestampsTz(0);
            $table->softDeletesTz(0);
            $table->comment('Departments/branches for user organization structure.');
        });
    }

    public function down(): void
    {
        // Drop FKs before table for safe rollback
        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign(['head_user_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
            $table->dropForeign(['deleted_by']);
        });
        Schema::dropIfExists('departments');
    }
};
