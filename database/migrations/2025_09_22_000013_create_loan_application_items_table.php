
<?php
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
            $table->id()->comment('Primary key');
            $table->foreignId('loan_application_id')->index()->constrained('loan_applications')->cascadeOnDelete()->comment('FK to loan_applications');
            $table->string('equipment_type')->nullable()->comment('Type of equipment requested');
            $table->integer('quantity_requested')->default(1)->index()->comment('Quantity requested');
            $table->integer('quantity_approved')->nullable()->index()->comment('Quantity approved');
            $table->integer('quantity_issued')->nullable()->index()->comment('Quantity issued');
            $table->integer('quantity_returned')->nullable()->index()->comment('Quantity returned');
            // Audit
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (creator)');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (updater)');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (deleter)');
            $table->timestampsTz(0);
            $table->softDeletesTz(0);
            $table->comment('Line items for loan applications.');
        });
    }

    public function down(): void
    {
        Schema::table('loan_application_items', function (Blueprint $table) {
            $table->dropForeign(['loan_application_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
            $table->dropForeign(['deleted_by']);
        });
        Schema::dropIfExists('loan_application_items');
    }
};
