<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration: Create loan_transactions table for issue/return events
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loan_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_application_id');
            $table->enum('type', ['issue','return']);
            $table->date('transaction_date');
            $table->unsignedBigInteger('issuing_officer_id');
            $table->unsignedBigInteger('receiving_officer_id');
            $table->json('accessories_checklist_on_issue')->nullable();
            $table->text('issue_notes')->nullable();
            $table->json('accessories_checklist_on_return')->nullable();
            $table->text('return_notes')->nullable();
            $table->enum('status', ['pending','issued','returned_good','returned_damaged']);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('loan_application_id')->references('id')->on('loan_applications')->cascadeOnDelete();
            // issuing/receiving officer and audit user foreign keys will be added later in a post-users migration
            $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('deleted_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_transactions');
    }
};
