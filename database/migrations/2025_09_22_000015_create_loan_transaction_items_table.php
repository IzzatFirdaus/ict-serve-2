<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loan_transaction_items', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->foreignId('loan_transaction_id')->index();
            $table->foreignId('equipment_id')->nullable()->index();
            $table->enum('status', ['issued', 'returned_good', 'returned_damaged', 'reported_lost'])->default('issued')->index()->comment('Item status');
            $table->string('condition_on_return')->nullable()->comment('Condition on return');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (creator)');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (updater)');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (deleter)');
            $table->timestampsTz(0);
            $table->softDeletesTz(0);
            $table->comment('Per-item records for loan transactions.');

            $table->foreign('loan_transaction_id', 'lti_loan_transaction_id_fk')
                ->references('id')->on('loan_transactions')->cascadeOnDelete();
            $table->foreign('equipment_id', 'lti_equipment_id_fk')
                ->references('id')->on('equipment')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('loan_transaction_items', function (Blueprint $table) {
            $table->dropForeign('lti_loan_transaction_id_fk');
            $table->dropForeign('lti_equipment_id_fk');
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
            $table->dropForeign(['deleted_by']);
        });
        Schema::dropIfExists('loan_transaction_items');
    }
};
