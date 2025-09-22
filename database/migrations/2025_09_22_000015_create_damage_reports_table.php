<?php
<<<<<<< HEAD:database/migrations/2025_09_22_000015_create_damage_reports_table.php
=======

/**
 * Migration for damage_reports table.
 * Records reported damages related to equipment or services.
 */
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe)):database/migrations/2025_09_22_000018_create_damage_reports_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the damage_reports table.
 * Stores reports of equipment damage, linked to helpdesk categories.
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('damage_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('position_grade')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
<<<<<<< HEAD:database/migrations/2025_09_22_000015_create_damage_reports_table.php
            $table->unsignedBigInteger('damage_type')->nullable();
            $table->text('description');
            $table->boolean('confirmation')->default(false);
            $table->enum('status', ['new', 'assigned', 'in_progress', 'resolved', 'closed'])->default('new');
            $table->unsignedBigInteger('assigned_to_user_id')->nullable();
=======
            $table->unsignedBigInteger('damage_type')->nullable()->index();
            $table->text('description')->nullable();
            $table->boolean('confirmation')->default(false)->index();
            $table->enum('status', ['new', 'assigned', 'in_progress', 'resolved', 'closed'])->default('new')->index();
            $table->unsignedBigInteger('assigned_to_user_id')->nullable()->index();
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe)):database/migrations/2025_09_22_000018_create_damage_reports_table.php
            $table->text('resolution_notes')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('department_id')->references('id')->on('departments')->nullOnDelete();
            $table->foreign('damage_type')->references('id')->on('helpdesk_categories')->nullOnDelete();
            $table->foreign('assigned_to_user_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('deleted_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('damage_reports');
    }
};
