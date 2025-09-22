<?php
<<<<<<< HEAD:database/migrations/2025_09_22_000009_create_loan_applications_table.php
=======

/**
 * Migration for loan_applications table.
 * Tracks loan requests for equipment.
 */
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe)):database/migrations/2025_09_22_000012_create_loan_applications_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the loan_applications table.
 * Stores all ICT equipment loan applications and their approval workflow.
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('responsible_officer_id')->nullable();
            $table->unsignedBigInteger('supporting_officer_id')->nullable();
            $table->text('purpose');
            $table->string('location')->nullable();
            $table->string('return_location')->nullable();
<<<<<<< HEAD:database/migrations/2025_09_22_000009_create_loan_applications_table.php
            $table->date('loan_start_date');
            $table->date('loan_end_date');
            $table->enum('status', ['draft', 'pending_support', 'approved', 'rejected', 'issued', 'returned', 'completed'])->default('draft');
=======
            $table->date('loan_start_date')->nullable();
            $table->date('loan_end_date')->nullable();
            $table->enum('status', ['draft', 'pending_support', 'approved', 'rejected', 'issued', 'returned', 'completed'])->default('draft')->index();
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe)):database/migrations/2025_09_22_000012_create_loan_applications_table.php
            $table->text('rejection_reason')->nullable();
            $table->timestamp('applicant_confirmation_timestamp')->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->unsignedBigInteger('rejected_by')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->unsignedBigInteger('cancelled_by')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->text('admin_notes')->nullable();
            $table->unsignedBigInteger('current_approval_officer_id')->nullable();
            $table->integer('current_approval_stage')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('responsible_officer_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('supporting_officer_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('approved_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('rejected_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('cancelled_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('current_approval_officer_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('deleted_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_applications');
    }
};
