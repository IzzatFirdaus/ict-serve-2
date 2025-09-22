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
            $table->string('auditable_type')->index();
            $table->unsignedBigInteger('auditable_id')->index();
            $table->string('event')->index(); // created, updated, deleted
            $table->json('old_values')->nullable();
            $table->json('new_values')->nullable();
            $table->text('url')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('tags')->nullable()->index();

            $table->timestamps();

            // Foreign key to users optional - keep nullable with nullOnDelete
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();

            $table->comment('Application audit logs for model events.');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
