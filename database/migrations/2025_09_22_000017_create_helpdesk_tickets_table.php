
<?php
/**
 * Migration for helpdesk_tickets table.
 * Tracks support tickets raised by users.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('helpdesk_tickets', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('assigned_to_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('helpdesk_categories')->nullOnDelete();

            // Core fields
            $table->string('subject');
            $table->text('description');
            $table->enum('status', ['open', 'in_progress', 'pending_user_feedback', 'resolved', 'closed', 'reopened'])->default('open')->index();
            $table->enum('priority', ['low', 'medium', 'high', 'critical'])->default('medium')->index();
            $table->date('due_date')->nullable()->index();
            $table->text('resolution_notes')->nullable();
            $table->timestampTz('closed_at')->nullable()->index();

            // Audit
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestampsTz();
            $table->softDeletesTz();

            $table->comment('Support tickets raised by users.');
        });
    }

    public function down(): void
    {
        // Drop foreign keys explicitly for clarity and to avoid errors on some MySQL versions
        if (Schema::hasTable('helpdesk_tickets')) {
            Schema::table('helpdesk_tickets', function (Blueprint $table) {
                $sm = Schema::getConnection()->getDoctrineSchemaManager();
                // Attempt to drop foreign keys if they exist. Using try/catch because Doctrine names can vary.
                try {
                    $table->dropForeign(['user_id']);
                } catch (\Throwable $e) {
                    // ignore
                }

                try {
                    $table->dropForeign(['assigned_to_user_id']);
                } catch (\Throwable $e) {
                    // ignore
                }

                try {
                    $table->dropForeign(['category_id']);
                } catch (\Throwable $e) {
                    // ignore
                }

                try {
                    $table->dropForeign(['created_by']);
                } catch (\Throwable $e) {
                    // ignore
                }

                try {
                    $table->dropForeign(['updated_by']);
                } catch (\Throwable $e) {
                    // ignore
                }

                try {
                    $table->dropForeign(['deleted_by']);
                } catch (\Throwable $e) {
                    // ignore
                }
            });

            Schema::dropIfExists('helpdesk_tickets');
        }
    }
};
