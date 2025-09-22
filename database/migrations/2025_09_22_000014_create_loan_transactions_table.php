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
            $table->id();
            $table->unsignedBigInteger('loan_application_id')->index();
            $table->enum('type', ['issue', 'return'])->index();
            $table->date('transaction_date')->nullable()->index();
            $table->unsignedBigInteger('issuing_officer_id')->nullable()->index();
            $table->unsignedBigInteger('receiving_officer_id')->nullable()->index();
            $table->json('accessories_checklist_on_issue')->nullable();
            $table->text('issue_notes')->nullable();
            $table->json('accessories_checklist_on_return')->nullable();
            $table->text('return_notes')->nullable();
            $table->enum('status', ['pending', 'issued', 'returned_good', 'returned_damaged'])->default('pending')->index();

            // Audit
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            // Foreign keys
            $table->foreign('loan_application_id')->references('id')->on('loan_applications')->cascadeOnDelete();
            $table->foreign('issuing_officer_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('receiving_officer_id')->references('id')->on('users')->nullOnDelete();

            $table->comment('Transactions (issue/return) for loaned equipment.');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_transactions');
    }
};
