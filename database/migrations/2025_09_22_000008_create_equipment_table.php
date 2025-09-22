<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the equipment table.
 * Stores all equipment/assets and their status/location.
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('asset_type');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable()->index();
            $table->string('tag_id')->nullable()->unique();
            $table->date('purchase_date')->nullable();
            $table->date('warranty_expiry_date')->nullable();
            $table->enum('status', ['available', 'on_loan', 'under_maintenance', 'retired'])->default('available');
            $table->string('current_location')->nullable();
            $table->text('notes')->nullable();
            $table->enum('condition_status', ['baru', 'baik', 'sederhana', 'rosak', 'hilang'])->default('baik');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('equipment_category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->string('item_code')->nullable()->index();
            $table->text('description')->nullable();
            $table->decimal('purchase_price', 12, 2)->nullable();
            $table->enum('acquisition_type', ['pembelian', 'sumbangan', 'pemindahan'])->nullable();
            $table->string('classification')->nullable();
            $table->string('funded_by')->nullable();
            $table->string('supplier_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->foreign('department_id')->references('id')->on('departments')->nullOnDelete();
            $table->foreign('equipment_category_id')->references('id')->on('equipment_categories')->nullOnDelete();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->nullOnDelete();
            $table->foreign('location_id')->references('id')->on('locations')->nullOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('deleted_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
