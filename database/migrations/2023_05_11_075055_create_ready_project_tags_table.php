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
        Schema::create('ready_project_tags', function (Blueprint $table) {
            $table->timestamps();

            // foreign keys
            $table->foreignId('tag_id')->constrained('tags')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('ready_project_id')->constrained('ready_projects')->cascadeOnDelete()->cascadeOnUpdate();

            // contrains
            $table->primary(['tag_id', 'ready_project_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ready_project_tags');
    }
};
