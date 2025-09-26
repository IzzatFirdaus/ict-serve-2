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
    public function up(): void
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->string('asset_type')->nullable()->comment('Type of asset');
            $table->string('brand')->nullable()->comment('Brand');
            $table->string('model')->nullable()->comment('Model');
            $table->string('serial_number')->nullable()->unique()->comment('Serial number, unique');
            $table->string('tag_id')->nullable()->unique()->comment('Asset tag, unique');
            $table->date('purchase_date')->nullable()->comment('Purchase date');
            $table->date('warranty_expiry_date')->nullable()->comment('Warranty expiry date');
            $table->enum('status', ['available', 'on_loan', 'under_maintenance', 'retired'])->default('available')->index()->comment('Equipment status');
            $table->string('current_location')->nullable()->comment('Current location');
            $table->text('notes')->nullable()->comment('Notes');
            $table->enum('condition_status', ['baru', 'baik', 'sederhana', 'rosak', 'hilang'])->default('baik')->index()->comment('Condition status');
            $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete()->comment('FK to departments');
            $table->foreignId('equipment_category_id')->nullable()->constrained('equipment_categories')->nullOnDelete()->comment('FK to equipment_categories');
            $table->foreignId('sub_category_id')->nullable()->constrained('sub_categories')->nullOnDelete()->comment('FK to sub_categories');
            $table->foreignId('location_id')->nullable()->constrained('locations')->nullOnDelete()->comment('FK to locations');
            $table->string('item_code')->nullable()->index()->comment('Item code');
            $table->text('description')->nullable()->comment('Description');
            $table->decimal('purchase_price', 15, 2)->nullable()->comment('Purchase price');
            $table->enum('acquisition_type', ['pembelian', 'sumbangan', 'pemindahan'])->nullable()->index()->comment('Acquisition type');
            $table->string('classification')->nullable()->index()->comment('Classification');
            $table->string('funded_by')->nullable()->comment('Funded by');
            $table->string('supplier_name')->nullable()->comment('Supplier name');
            // Audit columns
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (creator)');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (updater)');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (deleter)');
            $table->timestampsTz(0);
            $table->softDeletesTz(0);
            $table->comment('Stores equipment and asset records for ICTServe.');
        });
    }

    public function down(): void
    {
        // Drop FKs before table for safe rollback
        Schema::table('equipment', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropForeign(['equipment_category_id']);
            $table->dropForeign(['sub_category_id']);
            $table->dropForeign(['location_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
            $table->dropForeign(['deleted_by']);
        });
        Schema::dropIfExists('equipment');
    }
};
