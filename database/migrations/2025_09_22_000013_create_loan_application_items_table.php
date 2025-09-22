<?php
<<<<<<< HEAD:database/migrations/2025_09_22_000010_create_loan_application_items_table.php
=======

/**
 * Migration for loan_application_items table.
 * Items requested in a loan application.
 */
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe)):database/migrations/2025_09_22_000013_create_loan_application_items_table.php

/**
 * Migration for loan_application_items table.
 * Items requested in a loan application.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loan_application_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_application_id')->index();
            $table->string('equipment_type')->nullable();
            $table->integer('quantity_requested')->default(1)->index();
            $table->integer('quantity_approved')->nullable()->index();
            $table->integer('quantity_issued')->nullable()->index();
            $table->integer('quantity_returned')->nullable()->index();

            // Audit
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('loan_application_id')->references('id')->on('loan_applications')->cascadeOnDelete();

            $table->comment('Line items for loan applications.');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_application_items');
    }
};
