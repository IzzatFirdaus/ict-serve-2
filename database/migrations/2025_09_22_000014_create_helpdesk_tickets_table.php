<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration: Create helpdesk_tickets table for support requests
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('helpdesk_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('assigned_to_user_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('subject');
            $table->text('description');
            $table->enum('status', ['open','in_progress','pending_user_feedback','resolved','closed','reopened']);
            $table->enum('priority', ['low','medium','high','critical']);
            $table->date('due_date')->nullable();
            $table->text('resolution_notes')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('assigned_to_user_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('category_id')->references('id')->on('helpdesk_categories')->cascadeOnDelete();
            // audit user foreign keys will be added later in a post-users migration
            $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('deleted_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('helpdesk_tickets');
    }
};
