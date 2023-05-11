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
        Schema::create('payment_addons', function (Blueprint $table) {
            $table->timestamps();

            // foreign keys
            $table->foreignId('addon_id')->constrained('addons')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('payment_id')->constrained('payments')->cascadeOnUpdate()->cascadeOnDelete();

            // contrains
            $table->primary(['addon_id', 'payment_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_addons');
    }
};
