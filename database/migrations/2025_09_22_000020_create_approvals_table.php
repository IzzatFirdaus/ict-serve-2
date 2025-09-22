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
            $table->morphs('approvable');
            $table->unsignedBigInteger('officer_id')->nullable()->index();
            $table->string('stage')->nullable()->index();
            $table->enum('status', ['pending','approved','rejected'])->default('pending')->index();
            $table->text('comments')->nullable();
            $table->timestamp('approval_timestamp')->nullable()->index();

            // Audit
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('officer_id')->references('id')->on('users')->nullOnDelete();

            $table->comment('Approval records for various approvable models.');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
