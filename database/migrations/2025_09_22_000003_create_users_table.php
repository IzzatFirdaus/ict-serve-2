<?php
<<<<<<< HEAD:database/migrations/2025_09_22_000004_create_users_table.php
=======

/**
 * Migration: Create users table for ICTServe (iServe) system.
 * Includes all specified fields, enums, audit columns, foreign keys, and comments.
 * Follows Laravel 12 conventions and robust auditability.
 */
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe)):database/migrations/2025_09_22_000003_create_users_table.php

/**
 * Migration: Create users table for ICTServe (iServe) system.
 * Includes all specified fields, enums, audit columns, foreign keys, and comments.
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->comment('User title (e.g., Mr, Ms, Dr)');
            $table->string('name');
            $table->string('identification_number')->unique();
            $table->string('passport_number')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('grade_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('level')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status', ['aktif', 'tidak_aktif', 'digantung'])->default('aktif');
            $table->timestamp('email_verified_at')->nullable();
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->timestamp('two_factor_confirmed_at')->nullable();
            $table->rememberToken();
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();

            // Foreign keys
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('set null');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('set null');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
