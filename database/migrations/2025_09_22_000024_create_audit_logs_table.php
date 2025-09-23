<?php

/**
 * Migration for audit_logs table.
 * Stores model-level audit entries. Compatible with package or custom auditing.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->string('auditable_type')->index()->comment('The model class name that was changed');
            $table->unsignedBigInteger('auditable_id')->index()->comment('The primary key of the changed model');
            $table->string('event')->index()->comment('Event type: created, updated, deleted'); // created, updated, deleted
            $table->json('old_values')->nullable();
            $table->json('new_values')->nullable();
            $table->text('url')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();

            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('user_type')->nullable()->index()->comment('Optional user provider/type (e.g., web, api, oauth)'); // may hold oauth/provider info
            $table->string('tags')->nullable()->index()->comment('Comma-separated tags to aid searching');

            $table->timestampsTz();

            $table->index(['auditable_type', 'auditable_id'], 'audit_auditable_type_id_idx');

            $table->comment('Application audit logs for model events.');
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('audit_logs')) {
            Schema::table('audit_logs', function (Blueprint $table) {
                try {
                    $table->dropForeign(['user_id']);
                } catch (\Throwable $e) {
                }
            });

            Schema::dropIfExists('audit_logs');
        }
    }
};
