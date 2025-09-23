<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the positions table.
 * Stores job positions and links to grades.
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Position name');
            $table->foreignId('grade_id')->nullable()->index();
            $table->text('description')->nullable()->comment('Optional description for the position');
            $table->boolean('is_active')->default(true)->index()->comment('Whether the position is active');

            // Audit columns
            $table->foreignId('created_by')->nullable()->index();
            $table->foreignId('updated_by')->nullable()->index();
            $table->foreignId('deleted_by')->nullable()->index();

            $table->timestampsTz();
            $table->softDeletesTz();

            $table->comment('Job positions and mapping to grades.');
        });

        Schema::table('positions', function (Blueprint $table) {
            $table->foreign('grade_id', 'positions_grade_id_fk')
                ->references('id')->on('grades')->onDelete('set null');

            $table->foreign('created_by', 'positions_created_by_fk')
                ->references('id')->on('users')->onDelete('set null');

            $table->foreign('updated_by', 'positions_updated_by_fk')
                ->references('id')->on('users')->onDelete('set null');

            $table->foreign('deleted_by', 'positions_deleted_by_fk')
                ->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('positions')) {
            Schema::table('positions', function (Blueprint $table) {
                foreach (['grade_id', 'created_by', 'updated_by', 'deleted_by'] as $col) {
                    try {
                        $table->dropForeign([$col]);
                    } catch (\Throwable $e) {
                        // ignore
                    }
                }
            });

            Schema::dropIfExists('positions');
        }
    }
};
