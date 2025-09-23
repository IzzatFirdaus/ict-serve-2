<?php

/**
 * Migration for approvals table.
 * Generic approvals for polymorphic approvable entities.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            // Polymorphic relation (bigInteger id + string type)
            $table->unsignedBigInteger('approvable_id');
            $table->string('approvable_type');
            $table->index(['approvable_id', 'approvable_type']);

            $table->foreignId('officer_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('stage')->nullable()->index();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->index();
            $table->text('comments')->nullable();
            $table->timestampTz('approval_timestamp')->nullable()->index();

            // Audit
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestampsTz();
            $table->softDeletesTz();

            $table->comment('Approval records for various approvable models.');
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('approvals')) {
            Schema::table('approvals', function (Blueprint $table) {
                try {
                    $table->dropForeign(['officer_id']);
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

            Schema::dropIfExists('approvals');
        }
    }
};
