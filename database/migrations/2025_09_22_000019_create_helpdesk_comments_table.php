
<?php
/**
 * Migration for helpdesk_comments table.
 * Comments attached to helpdesk tickets; supports internal notes.
 */

/**
 * Migration for helpdesk_comments table.
 * Comments attached to helpdesk tickets; supports internal notes.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('helpdesk_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id')->index();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->text('comment');
            $table->boolean('is_internal')->default(false)->index();

            // Audit
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->unsignedBigInteger('deleted_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ticket_id')->references('id')->on('helpdesk_tickets')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();

            $table->comment('Comments and internal notes for helpdesk tickets.');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('helpdesk_comments');
    }
};
