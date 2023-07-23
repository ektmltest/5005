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
        Schema::create('project_reply_attachments', function (Blueprint $table) {
            $table->string('file');
            $table->timestamps();

            // foreign keys
            $table->foreignId('project_reply_id')->constrained('project_replies')->cascadeOnDelete();

            // constrains
            $table->primary(['file', 'project_reply_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_reply_attachments');
    }
};
