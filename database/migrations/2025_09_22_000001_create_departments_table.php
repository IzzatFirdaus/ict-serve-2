<?php

/**
 * Migration: Create departments table for ICTServe (iServe) system.
 * Includes id, name, branch_type, code, description, is_active, head_user_id, audit fields.
 * Follows Laravel 12 conventions and robust auditability.
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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->enum('branch_type', ['ibu_pejabat', 'pejabat_negeri', 'unit']);
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('head_user_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();

            // Foreign keys
            // $table->foreign('head_user_id')->references('id')->on('users')->onDelete('set null'); // Removed to avoid circular dependency
            // Audit user foreign keys removed to avoid circular dependency
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
