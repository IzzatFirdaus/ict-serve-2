<?php
<<<<<<< HEAD:database/migrations/2025_09_22_000011_create_loan_transactions_table.php
=======

/**
 * Migration for loan_transactions table.
 * Records issues and returns of equipment for approved loan applications.
 */
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe)):database/migrations/2025_09_22_000014_create_loan_transactions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the loan_transactions table.
 * Stores issue/return transactions for each loan application.
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('loan_transactions', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2025_09_22_000011_create_loan_transactions_table.php
            $table->unsignedBigInteger('loan_application_id');
            $table->enum('type', ['issue', 'return']);
            $table->dateTime('transaction_date');
            $table->unsignedBigInteger('issuing_officer_id')->nullable();
            $table->unsignedBigInteger('receiving_officer_id')->nullable();
=======
            $table->unsignedBigInteger('loan_application_id')->index();
            $table->enum('type', ['issue', 'return'])->index();
            $table->date('transaction_date')->nullable()->index();
            $table->unsignedBigInteger('issuing_officer_id')->nullable()->index();
            $table->unsignedBigInteger('receiving_officer_id')->nullable()->index();
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe)):database/migrations/2025_09_22_000014_create_loan_transactions_table.php
            $table->json('accessories_checklist_on_issue')->nullable();
            $table->text('issue_notes')->nullable();
            $table->json('accessories_checklist_on_return')->nullable();
            $table->text('return_notes')->nullable();
<<<<<<< HEAD:database/migrations/2025_09_22_000011_create_loan_transactions_table.php
            $table->enum('status', ['pending', 'issued', 'returned_good', 'returned_damaged'])->default('pending');
=======
            $table->enum('status', ['pending', 'issued', 'returned_good', 'returned_damaged'])->default('pending')->index();

            // Audit
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();

>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe)):database/migrations/2025_09_22_000014_create_loan_transactions_table.php
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->foreign('loan_application_id')->references('id')->on('loan_applications')->cascadeOnDelete();
            $table->foreign('issuing_officer_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('receiving_officer_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('deleted_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_transactions');
    }
};
