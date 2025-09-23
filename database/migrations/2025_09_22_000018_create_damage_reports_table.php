
<?php

/**
 * Migration for damage_reports table.
 * Records reported damages related to equipment or services.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('damage_reports', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete();

            $table->string('position_grade')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();

            $table->foreignId('damage_type')->nullable()->constrained('helpdesk_categories')->nullOnDelete();
            $table->text('description')->nullable();
            $table->boolean('confirmation')->default(false)->index();
            $table->enum('status', ['new', 'assigned', 'in_progress', 'resolved', 'closed'])->default('new')->index();
            $table->foreignId('assigned_to_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->text('resolution_notes')->nullable();
            $table->timestampTz('closed_at')->nullable()->index();

            // Audit
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestampsTz();
            $table->softDeletesTz();

            $table->comment('Reports of damage/incidents.');
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('damage_reports')) {
            Schema::table('damage_reports', function (Blueprint $table) {
                foreach (['user_id', 'department_id', 'damage_type', 'assigned_to_user_id', 'created_by', 'updated_by', 'deleted_by'] as $col) {
                    try {
                        $table->dropForeign([$col]);
                    } catch (\Throwable $e) {
                        // ignore
                    }
                }
            });

            Schema::dropIfExists('damage_reports');
        }
    }
};
