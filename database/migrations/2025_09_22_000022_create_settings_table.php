
<?php
/**
 * Migration for settings table.
 * Stores application key/value settings as JSON.
 */

/**
 * Migration for settings table.
 * Stores application key/value settings as JSON.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->json('value')->nullable();

            // Audit
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            $table->comment('Application configuration and settings.');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
