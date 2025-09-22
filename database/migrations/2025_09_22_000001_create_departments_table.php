<?php
<<<<<<< HEAD
=======

/**
 * Migration: Create departments table for ICTServe (iServe) system.
 * Includes id, name, branch_type, code, description, is_active, head_user_id, audit fields.
 * Follows Laravel 12 conventions and robust auditability.
 */
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe))

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
            $table->id();
<<<<<<< HEAD
            $table->string('name');
=======
            $table->string('name')->unique();
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe))
            $table->enum('branch_type', ['ibu_pejabat', 'pejabat_negeri', 'unit']);
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('head_user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->foreign('head_user_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('deleted_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
