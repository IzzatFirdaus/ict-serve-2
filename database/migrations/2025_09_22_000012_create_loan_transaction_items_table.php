<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the loan_transaction_items table.
 * Stores equipment items involved in each loan transaction.
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('loan_transaction_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_transaction_id');
            $table->unsignedBigInteger('equipment_id');
            $table->enum('status', ['issued', 'returned_good', 'returned_damaged', 'reported_lost'])->default('issued');
            $table->string('condition_on_return')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->foreign('loan_transaction_id')->references('id')->on('loan_transactions')->cascadeOnDelete();
            $table->foreign('equipment_id')->references('id')->on('equipment')->nullOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('deleted_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_transaction_items');
    }
};
