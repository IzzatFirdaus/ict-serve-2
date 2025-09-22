<?php
<<<<<<< HEAD:database/migrations/2025_09_22_000014_create_helpdesk_tickets_table.php
=======

/**
 * Migration for helpdesk_tickets table.
 * Tracks support tickets raised by users.
 */
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe)):database/migrations/2025_09_22_000017_create_helpdesk_tickets_table.php

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
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->unsignedBigInteger('assigned_to_user_id')->nullable()->index();
            $table->unsignedBigInteger('category_id')->nullable()->index();
            $table->string('subject');
<<<<<<< HEAD:database/migrations/2025_09_22_000017_create_helpdesk_tickets_table.php
=======
<<<<<<< HEAD:database/migrations/2025_09_22_000014_create_helpdesk_tickets_table.php
            $table->text('description');
            $table->enum('status', ['open', 'in_progress', 'pending_user_feedback', 'resolved', 'closed', 'reopened'])->default('open');
            $table->enum('priority', ['low', 'medium', 'high', 'critical'])->default('medium');
            $table->date('due_date')->nullable();
=======
>>>>>>> feature/migrations:database/migrations/2025_09_22_000014_create_helpdesk_tickets_table.php
            $table->text('description')->nullable();
            $table->enum('status', ['open', 'in_progress', 'pending_user_feedback', 'resolved', 'closed', 'reopened'])->default('open')->index();
            $table->enum('priority', ['low', 'medium', 'high', 'critical'])->default('medium')->index();
            $table->date('due_date')->nullable()->index();
<<<<<<< HEAD:database/migrations/2025_09_22_000017_create_helpdesk_tickets_table.php
=======
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe)):database/migrations/2025_09_22_000017_create_helpdesk_tickets_table.php
>>>>>>> feature/migrations:database/migrations/2025_09_22_000014_create_helpdesk_tickets_table.php
            $table->text('resolution_notes')->nullable();
            $table->timestamp('closed_at')->nullable()->index();

            // Audit
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('assigned_to_user_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('category_id')->references('id')->on('helpdesk_categories')->nullOnDelete();

            $table->comment('Support tickets raised by users.');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('helpdesk_tickets');
    }
};
