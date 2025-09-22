<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration: Create damage_reports table for reporting equipment damage
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('damage_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipment_id');
            $table->unsignedBigInteger('reported_by');
            $table->date('reported_at');
            $table->text('description');
            $table->enum('status', ['pending','in_progress','resolved','closed']);
            $table->text('resolution_notes')->nullable();
            $table->unsignedBigInteger('resolved_by')->nullable();
            $table->timestamp('resolved_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('equipment_id')->references('id')->on('equipment')->cascadeOnDelete();
            $table->foreign('reported_by')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('resolved_by')->references('id')->on('users')->nullOnDelete();
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
        Schema::dropIfExists('damage_reports');
    }
};
