<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration: Create loan_application_items table for items in each loan application
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loan_application_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_application_id');
            $table->string('equipment_type');
            $table->integer('quantity_requested');
            $table->integer('quantity_approved')->nullable();
            $table->integer('quantity_issued')->nullable();
            $table->integer('quantity_returned')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('loan_application_id')->references('id')->on('loan_applications')->cascadeOnDelete();
            // audit user foreign keys will be added later in a post-users migration
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_application_items');
    }
};
