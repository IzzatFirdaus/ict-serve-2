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
            $table->id()->comment('Primary key');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete()->comment('Applicant user');
            $table->foreignId('responsible_officer_id')->nullable()->constrained('users')->nullOnDelete()->comment('Responsible officer');
            $table->foreignId('supporting_officer_id')->nullable()->constrained('users')->nullOnDelete()->comment('Supporting officer');
            $table->text('purpose')->nullable()->comment('Purpose of the loan');
            $table->string('location')->nullable()->comment('Pickup location');
            $table->string('return_location')->nullable()->comment('Return location');
            $table->date('loan_start_date')->nullable()->comment('Loan start date');
            $table->date('loan_end_date')->nullable()->comment('Loan end date');
            $table->enum('status', ['draft', 'pending_support', 'approved', 'rejected', 'issued', 'returned', 'completed'])->default('draft')->index()->comment('Application status');
            $table->text('rejection_reason')->nullable()->comment('Reason for rejection');
            $table->timestampTz('applicant_confirmation_timestamp')->nullable()->comment('Applicant confirmation timestamp');
            $table->timestampTz('submitted_at')->nullable()->index()->comment('Submitted at');

            // approval metadata
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete()->comment('Approved by user');
            $table->timestampTz('approved_at')->nullable()->comment('Approved at');
            $table->foreignId('rejected_by')->nullable()->constrained('users')->nullOnDelete()->comment('Rejected by user');
            $table->timestampTz('rejected_at')->nullable()->comment('Rejected at');
            $table->foreignId('cancelled_by')->nullable()->constrained('users')->nullOnDelete()->comment('Cancelled by user');
            $table->timestampTz('cancelled_at')->nullable()->comment('Cancelled at');

            $table->text('admin_notes')->nullable()->comment('Administrative notes');
            $table->foreignId('current_approval_officer_id')->nullable()->constrained('users')->nullOnDelete()->comment('Current approval officer');
            $table->string('current_approval_stage')->nullable()->comment('Current approval stage');

            // Audit
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (creator)');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (updater)');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (deleter)');

            $table->timestampsTz(0);
            $table->softDeletesTz(0);

            $table->comment('Loan application requests for equipment.');
        });
    }

    public function down(): void
    {
        Schema::table('loan_applications', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['responsible_officer_id']);
            $table->dropForeign(['supporting_officer_id']);
            $table->dropForeign(['approved_by']);
            $table->dropForeign(['rejected_by']);
            $table->dropForeign(['cancelled_by']);
            $table->dropForeign(['current_approval_officer_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
            $table->dropForeign(['deleted_by']);
        });
        Schema::dropIfExists('loan_applications');
    }
};
