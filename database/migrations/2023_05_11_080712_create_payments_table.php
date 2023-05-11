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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->enum('state', ['accepted', 'rejected']);
            $table->string('invoice_image');
            $table->timestamps();

            // foreign keys
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnUpdate();
            $table->foreignId('bank_card_id')->constrained('bank_cards')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
