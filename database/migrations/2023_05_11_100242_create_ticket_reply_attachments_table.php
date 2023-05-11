<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ticket_reply_attachments', function (Blueprint $table) {
            $table->string('file');
            $table->timestamps();

            // foreign keys
            $table->foreignId('ticket_reply_id')->constrained('ticket_replies')->cascadeOnDelete()->cascadeOnUpdate();

            // contrains
            $table->primary(['file', 'ticket_reply_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_reply_attachments');
    }
};
