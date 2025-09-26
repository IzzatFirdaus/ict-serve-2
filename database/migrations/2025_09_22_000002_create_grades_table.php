<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the grades table.
 * Stores user grade/level information for approval and position mapping.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Grade name/title');
            $table->integer('level')->index()->comment('Numerical level for ordering and comparisons');
            $table->foreignId('min_approval_grade_id')->nullable()->constrained('grades')->nullOnDelete()->comment('The minimum grade required to approve requests from this grade');
            $table->boolean('is_approver_grade')->default(false)->index()->comment('Whether this grade can approve certain workflows');
            // Audit columns
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (creator)');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (updater)');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete()->comment('FK to users (deleter)');
            $table->timestampsTz(0);
            $table->softDeletesTz(0);
            $table->comment('User grades and levels used for approvals and position mapping.');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
