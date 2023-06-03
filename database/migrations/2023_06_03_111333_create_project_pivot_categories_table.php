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
        Schema::create('project_pivot_categories', function (Blueprint $table) {
            $table->timestamps();

            // foreign keys
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('project_category_id')->constrained('project_categories')->cascadeOnDelete()->cascadeOnUpdate();

            // contrains
            $table->primary(['project_id', 'project_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_pivot_categories');
    }
};
