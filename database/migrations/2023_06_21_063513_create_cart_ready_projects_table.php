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
        Schema::create('cart_ready_projects', function (Blueprint $table) {
            $table->timestamps();

            // foreign
            $table->foreignId('ready_project_id')->constrained('ready_projects')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('cart_id')->constrained('carts')->cascadeOnDelete()->cascadeOnUpdate();

            // constrains
            $table->primary(['ready_project_id', 'cart_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_ready_projects');
    }
};
