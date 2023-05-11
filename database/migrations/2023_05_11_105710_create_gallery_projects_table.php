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
        Schema::create('gallery_projects', function (Blueprint $table) {
            $table->id();
            $table->json('description');
            $table->string('image');
            $table->timestamps();

            // foreign keys
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('gallery_type_id')->constrained('gallery_project_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_projects');
    }
};
