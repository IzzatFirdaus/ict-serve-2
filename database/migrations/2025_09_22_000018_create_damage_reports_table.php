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
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->unsignedBigInteger('department_id')->nullable()->index();
            $table->string('position_grade')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->unsignedBigInteger('damage_type')->nullable()->index();
            $table->text('description')->nullable();
            $table->boolean('confirmation')->default(false)->index();
            $table->enum('status', ['new','assigned','in_progress','resolved','closed'])->default('new')->index();
            $table->unsignedBigInteger('assigned_to_user_id')->nullable()->index();
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
            $table->foreign('department_id')->references('id')->on('departments')->nullOnDelete();
            $table->foreign('damage_type')->references('id')->on('helpdesk_categories')->nullOnDelete();
            $table->foreign('assigned_to_user_id')->references('id')->on('users')->nullOnDelete();

            $table->comment('Reports of damage/incidents.');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('damage_reports');
    }
};
