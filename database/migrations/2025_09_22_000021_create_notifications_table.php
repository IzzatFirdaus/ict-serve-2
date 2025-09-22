<?php
<<<<<<< HEAD:database/migrations/2025_09_22_000018_create_notifications_table.php
=======

/**
 * Migration for notifications table.
 * Application notifications stored for users and polymorphic notifiable models.
 */
>>>>>>> bcbdec1 (feat(migrations): add and update all migration files for ICTServe (iServe)):database/migrations/2025_09_22_000021_create_notifications_table.php

/**
 * Migration for notifications table.
 * Application notifications stored for users and polymorphic notifiable models.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->morphs('notifiable');
            $table->json('data');
            $table->timestamp('read_at')->nullable()->index();

            // Audit
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            $table->comment('Application notifications (stored).');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
