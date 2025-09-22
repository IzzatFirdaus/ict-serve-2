<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration: Create equipment table for all ICT assets
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('asset_type');
            $table->string('brand');
            $table->string('model');
            $table->string('serial_number')->unique();
            $table->string('tag_id')->unique();
            $table->date('purchase_date')->nullable();
            $table->date('warranty_expiry_date')->nullable();
            $table->enum('status', ['available','on_loan','under_maintenance','retired']);
            $table->string('current_location')->nullable();
            $table->text('notes')->nullable();
            $table->enum('condition_status', ['baru','baik','sederhana','rosak','hilang']);
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('equipment_category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('location_id');
            $table->string('item_code')->nullable();
            $table->text('description')->nullable();
            $table->decimal('purchase_price', 12, 2)->nullable();
            $table->enum('acquisition_type', ['pembelian','sumbangan','pemindahan'])->nullable();
            $table->string('classification')->nullable();
            $table->string('funded_by')->nullable();
            $table->string('supplier_name')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('department_id')->references('id')->on('departments')->cascadeOnDelete();
            $table->foreign('equipment_category_id')->references('id')->on('equipment_categories')->cascadeOnDelete();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->cascadeOnDelete();
            $table->foreign('location_id')->references('id')->on('locations')->cascadeOnDelete();
            // audit user foreign keys will be added later in a post-users migration
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
