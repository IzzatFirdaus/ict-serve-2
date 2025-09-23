<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the grades table.
 * Stores user grade/level information for approval and position mapping.
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->string('name')->comment('Grade name');
            $table->integer('level')->index()->comment('Grade level (for hierarchy)');
            $table->foreignId('min_approval_grade_id')->nullable()->constrained('grades')->nullOnDelete()->comment('FK to grades (minimum approval)');
            $table->boolean('is_approver_grade')->default(false)->index()->comment('Is this an approver grade?');
            // Audit columns
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (creator)');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (updater)');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (deleter)');
            $table->timestampsTz(0);
            $table->softDeletesTz(0);
            $table->comment('User grade/level information for approval and position mapping.');
        });
    }

    public function down(): void
    {
        // Drop FKs before table for safe rollback
        Schema::table('grades', function (Blueprint $table) {
            $table->dropForeign(['min_approval_grade_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
            $table->dropForeign(['deleted_by']);
        });
        Schema::dropIfExists('grades');
    }
};
