<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration: Create loan_applications table for ICT loan requests
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('responsible_officer_id');
            $table->unsignedBigInteger('supporting_officer_id')->nullable();
            $table->text('purpose');
            $table->string('location');
            $table->string('return_location')->nullable();
            $table->date('loan_start_date');
            $table->date('loan_end_date');
            $table->enum('status', ['draft','pending_support','approved','rejected','issued','returned','completed']);
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
            $table->string('current_approval_stage')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('responsible_officer_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('supporting_officer_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('approved_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('rejected_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('cancelled_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('current_approval_officer_id')->references('id')->on('users')->nullOnDelete();
            // audit user foreign keys will be added later in a post-users migration
            $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('deleted_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_applications');
    }
};
