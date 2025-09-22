<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration: Create loan_transaction_items table for equipment in each transaction
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loan_transaction_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_transaction_id');
            $table->unsignedBigInteger('equipment_id');
            $table->enum('status', ['issued','returned_good','returned_damaged','reported_lost']);
            $table->string('condition_on_return')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('loan_transaction_id')->references('id')->on('loan_transactions')->cascadeOnDelete();
            $table->foreign('equipment_id')->references('id')->on('equipment')->cascadeOnDelete();
            // audit user foreign keys will be added later in a post-users migration
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_transaction_items');
    }
};
