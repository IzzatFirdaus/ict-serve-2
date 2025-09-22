<?php

/**
 * Migration for loan_transaction_items table.
 * Individual equipment items involved in a transaction.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loan_transaction_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_transaction_id')->index();
            $table->unsignedBigInteger('equipment_id')->nullable()->index();
            $table->enum('status', ['issued', 'returned_good', 'returned_damaged', 'reported_lost'])->default('issued')->index();
            $table->string('condition_on_return')->nullable();

            // Audit
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('loan_transaction_id')->references('id')->on('loan_transactions')->cascadeOnDelete();
            $table->foreign('equipment_id')->references('id')->on('equipment')->nullOnDelete();

            $table->comment('Per-item records for loan transactions.');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_transaction_items');
    }
};
