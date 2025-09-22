
<?php
/**
 * Migration for helpdesk_categories table.
 * Categories used to classify helpdesk tickets and damage reports.
 */

/**
 * Migration for helpdesk_categories table.
 * Categories used to classify helpdesk tickets and damage reports.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('helpdesk_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true)->index();

            // Audit
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            $table->comment('Helpdesk categories.');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('helpdesk_categories');
    }
};
