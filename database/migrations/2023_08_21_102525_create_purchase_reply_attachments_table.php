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
        Schema::create('purchase_reply_attachments', function (Blueprint $table) {
            $table->string('file');
            $table->timestamps();

            // foreign keys
            $table->foreignId('purchase_reply_id')->constrained('purchase_replies')->cascadeOnDelete()->cascadeOnUpdate();

            // contrains
            $table->primary(['file', 'purchase_reply_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_reply_attachments');
    }
};
