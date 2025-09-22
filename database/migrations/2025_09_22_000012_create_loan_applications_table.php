<?php

/**
 * Migration for loan_applications table.
 * Tracks loan requests for equipment.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->unsignedBigInteger('responsible_officer_id')->nullable()->index();
            $table->unsignedBigInteger('supporting_officer_id')->nullable()->index();
            $table->text('purpose')->nullable();
            $table->string('location')->nullable();
            $table->string('return_location')->nullable();
            $table->date('loan_start_date')->nullable();
            $table->date('loan_end_date')->nullable();
            $table->enum('status', ['draft', 'pending_support', 'approved', 'rejected', 'issued', 'returned', 'completed'])->default('draft')->index();
            $table->text('rejection_reason')->nullable();
            $table->timestamp('applicant_confirmation_timestamp')->nullable();
            $table->timestamp('submitted_at')->nullable()->index();

            // approval metadata
            $table->unsignedBigInteger('approved_by')->nullable()->index();
            $table->timestamp('approved_at')->nullable();
            $table->unsignedBigInteger('rejected_by')->nullable()->index();
            $table->timestamp('rejected_at')->nullable();
            $table->unsignedBigInteger('cancelled_by')->nullable()->index();
            $table->timestamp('cancelled_at')->nullable();

            $table->text('admin_notes')->nullable();
            $table->unsignedBigInteger('current_approval_officer_id')->nullable()->index();
            $table->string('current_approval_stage')->nullable();

            // Audit
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('responsible_officer_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('supporting_officer_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('approved_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('rejected_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('cancelled_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('current_approval_officer_id')->references('id')->on('users')->nullOnDelete();

            $table->comment('Loan application requests for equipment.');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_applications');
    }
};
