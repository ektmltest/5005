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
        Schema::create('ready_project_facilities', function (Blueprint $table) {
            $table->timestamps();

            // foreign keys
            $table->foreignId('ready_project_id')->constrained('ready_projects')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('facility_id')->constrained('facilities')->cascadeOnUpdate()->cascadeOnDelete();

            // contrains
            $table->primary(['ready_project_id', 'facility_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ready_project_facilities');
    }
};
