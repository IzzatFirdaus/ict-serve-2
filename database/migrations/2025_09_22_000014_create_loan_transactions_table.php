
<?php

/**
 * Migration for loan_transactions table.
 * Records issues and returns of equipment for approved loan applications.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loan_transactions', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->foreignId('loan_application_id')->constrained('loan_applications')->cascadeOnDelete()->index()->comment('FK to loan_applications');
            $table->enum('type', ['issue', 'return'])->index()->comment('Transaction type');
            $table->date('transaction_date')->nullable()->index()->comment('Transaction date');
            $table->foreignId('issuing_officer_id')->nullable()->constrained('users')->nullOnDelete()->comment('Issuing officer');
            $table->foreignId('receiving_officer_id')->nullable()->constrained('users')->nullOnDelete()->comment('Receiving officer');
            $table->json('accessories_checklist_on_issue')->nullable()->comment('Accessories checklist on issue');
            $table->text('issue_notes')->nullable()->comment('Issue notes');
            $table->json('accessories_checklist_on_return')->nullable()->comment('Accessories checklist on return');
            $table->text('return_notes')->nullable()->comment('Return notes');
            $table->enum('status', ['pending', 'issued', 'returned_good', 'returned_damaged'])->default('pending')->index()->comment('Transaction status');
            // Audit
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (creator)');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (updater)');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (deleter)');
            $table->timestampsTz(0);
            $table->softDeletesTz(0);
            $table->comment('Transactions (issue/return) for loaned equipment.');
        });
    }

    public function down(): void
    {
        Schema::table('loan_transactions', function (Blueprint $table) {
            $table->dropForeign(['loan_application_id']);
            $table->dropForeign(['issuing_officer_id']);
            $table->dropForeign(['receiving_officer_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
            $table->dropForeign(['deleted_by']);
        });
        Schema::dropIfExists('loan_transactions');
    }
};
