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
        Schema::create('ready_projects', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->double('price');
            $table->double('marketing_discount_ratio');
            $table->json('description');
            $table->json('short_description');
            $table->json('body');
            $table->string('image');
            $table->string('link');
            $table->timestamps();

            // foreign keys
            $table->foreignId('ready_project_department_id')->constrained('ready_project_departments')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ready_projects');
    }
};
