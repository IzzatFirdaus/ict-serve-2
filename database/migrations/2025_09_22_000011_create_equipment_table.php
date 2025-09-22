<?php

/**
 * Migration for equipment table.
 * Stores detailed equipment/assets information referenced by loans and helpdesk.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('asset_type')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable()->unique();
            $table->string('tag_id')->nullable()->unique();
            $table->date('purchase_date')->nullable();
            $table->date('warranty_expiry_date')->nullable();
            $table->enum('status', ['available', 'on_loan', 'under_maintenance', 'retired'])->default('available')->index();
            $table->string('current_location')->nullable();
            $table->text('notes')->nullable();
            $table->enum('condition_status', ['baru', 'baik', 'sederhana', 'rosak', 'hilang'])->default('baik')->index();

            $table->unsignedBigInteger('department_id')->nullable()->index();
            $table->unsignedBigInteger('equipment_category_id')->nullable()->index();
            $table->unsignedBigInteger('sub_category_id')->nullable()->index();
            $table->unsignedBigInteger('location_id')->nullable()->index();

            $table->string('item_code')->nullable()->index();
            $table->text('description')->nullable();
            $table->decimal('purchase_price', 15, 2)->nullable();
            $table->enum('acquisition_type', ['pembelian', 'sumbangan', 'pemindahan'])->nullable()->index();
            $table->string('classification')->nullable()->index();
            $table->string('funded_by')->nullable();
            $table->string('supplier_name')->nullable();

            // Audit fields
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            // Foreign keys
            $table->foreign('department_id')->references('id')->on('departments')->nullOnDelete();
            $table->foreign('equipment_category_id')->references('id')->on('equipment_categories')->nullOnDelete();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->nullOnDelete();
            $table->foreign('location_id')->references('id')->on('locations')->nullOnDelete();

            $table->comment('Stores equipment and asset records for ICTServe.');
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
