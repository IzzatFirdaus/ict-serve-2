<?php
<<<<<<< HEAD
=======

/**
 * Migration: Create positions table for ICTServe (iServe) system.
 * Includes id, name, grade_id, description, is_active, audit fields.
 * Follows Laravel 12 conventions and robust auditability.
 */
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe))

/**
 * Migration: Create positions table for ICTServe (iServe) system.
 * Includes id, name, grade_id, description, is_active, audit fields.
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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger('grade_id')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();

            // Foreign keys
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('set null');
            // Audit user foreign keys removed to avoid circular dependency
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
