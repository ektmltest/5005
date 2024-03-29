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
        Schema::create('project_states', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // todo: edited
            $table->string('icon');
            $table->string('unicode')->nullable();
            $table->enum('color', config('globals.colors'))->default('info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_states');
    }
};
