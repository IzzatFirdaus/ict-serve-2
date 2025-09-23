
<?php
/**
 * Migration for helpdesk_comments table.
 * Comments attached to helpdesk tickets; supports internal notes.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('helpdesk_comments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ticket_id')->constrained('helpdesk_tickets')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->text('comment');
            $table->boolean('is_internal')->default(false)->index();

            // Audit
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestampsTz();
            $table->softDeletesTz();

            $table->comment('Comments and internal notes for helpdesk tickets.');
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('helpdesk_comments')) {
            Schema::table('helpdesk_comments', function (Blueprint $table) {
                try {
                    $table->dropForeign(['ticket_id']);
                } catch (\Throwable $e) {
                }

                try {
                    $table->dropForeign(['user_id']);
                } catch (\Throwable $e) {
                }

                try {
                    $table->dropForeign(['created_by']);
                } catch (\Throwable $e) {
                }

                try {
                    $table->dropForeign(['updated_by']);
                } catch (\Throwable $e) {
                }

                try {
                    $table->dropForeign(['deleted_by']);
                } catch (\Throwable $e) {
                }
            });

            Schema::dropIfExists('helpdesk_comments');
        }
    }
};
