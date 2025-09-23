<?php

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
            $table->id()->comment('Primary key');
            $table->string('title')->nullable()->comment('User title (e.g., Mr, Ms, Dr)');
            $table->string('name')->comment('Full name');
            $table->string('identification_number')->unique()->comment('National ID number, unique');
            $table->string('passport_number')->nullable()->comment('Passport number, if any');
            $table->string('profile_photo_path')->nullable()->comment('Profile photo path');
            // Note: position/grade/department constraints are added in a later migration to avoid ordering issues
            $table->foreignId('position_id')->nullable()->index()->comment('FK to positions (constraint added after positions table exists)');
            $table->foreignId('grade_id')->nullable()->index()->comment('FK to grades (constraint added after grades table exists)');
            $table->foreignId('department_id')->nullable()->index()->comment('FK to departments (constraint added after departments table exists)');
            $table->string('level')->nullable()->comment('User level (legacy/optional)');
            $table->string('mobile_number')->nullable()->comment('Mobile phone number');
            $table->string('email')->unique()->comment('User email, unique');
            $table->string('password')->comment('Hashed password');
            $table->enum('status', ['aktif', 'tidak_aktif', 'digantung'])->default('aktif')->index()->comment('Account status: aktif, tidak_aktif, digantung');
            $table->timestampTz('email_verified_at')->nullable()->index()->comment('Email verification timestamp');
            $table->text('two_factor_secret')->nullable()->comment('2FA secret');
            $table->text('two_factor_recovery_codes')->nullable()->comment('2FA recovery codes');
            $table->timestampTz('two_factor_confirmed_at')->nullable()->comment('2FA confirmed at');
            $table->rememberToken()->comment('Remember me token');
            $table->string('lang', 10)->default('ms')->comment('User language (ms/en)');
            $table->string('theme', 20)->default('system')->comment('Theme: system, light, dark');
            // Audit columns
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (creator)');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (updater)');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (deleter)');
            $table->timestampsTz(0);
            $table->softDeletesTz(0);
            $table->comment('User accounts for ICTServe (iServe).');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop FKs before table for safe rollback
        Schema::table('users', function (Blueprint $table) {
            foreach (['position_id', 'grade_id', 'department_id', 'created_by', 'updated_by', 'deleted_by'] as $col) {
                try {
                    $table->dropForeign([$col]);
                } catch (\Throwable $e) {
                    // ignore if FK doesn't exist
                }
            }
        });
        Schema::dropIfExists('users');
    }
};
