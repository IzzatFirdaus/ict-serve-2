
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
            $table->id()->comment('Primary key');
            // Use explicit FK names to avoid DB-generated name collisions on some MySQL setups
            $table->unsignedBigInteger('loan_transaction_id')->index();
            $table->unsignedBigInteger('equipment_id')->nullable()->index();
            $table->enum('status', ['issued', 'returned_good', 'returned_damaged', 'reported_lost'])->default('issued')->index()->comment('Item status');
            $table->string('condition_on_return')->nullable()->comment('Condition on return');
            // Audit
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (creator)');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (updater)');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (deleter)');
            $table->timestampsTz(0);
            $table->softDeletesTz(0);
            $table->comment('Per-item records for loan transactions.');
        });

        // Add foreign keys with explicit names to avoid duplicate constraint name issues
        Schema::table('loan_transaction_items', function (Blueprint $table) {
            $table->foreign('loan_transaction_id', 'lti_loan_transaction_id_fk')
                ->references('id')->on('loan_transactions')->onDelete('cascade');

            $table->foreign('equipment_id', 'lti_equipment_id_fk')
                ->references('id')->on('equipment')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('loan_transaction_items', function (Blueprint $table) {
            try {
                $table->dropForeign('lti_loan_transaction_id_fk');
            } catch (\Throwable $e) {
            }

            try {
                $table->dropForeign('lti_equipment_id_fk');
            } catch (\Throwable $e) {
            }

            foreach (['created_by', 'updated_by', 'deleted_by'] as $col) {
                try {
                    $table->dropForeign([$col]);
                } catch (\Throwable $e) {
                }
            }
        });
        Schema::dropIfExists('loan_transaction_items');
    }
};
