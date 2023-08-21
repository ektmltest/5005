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
        Schema::create('purchase_addons', function (Blueprint $table) {
            $table->timestamps();
            // foreign
            $table->foreignId('purchase_id')->constrained('purchases')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('addon_id')->constrained('addons')->cascadeOnDelete()->cascadeOnUpdate();
            // constraint
            $table->primary(['addon_id', 'purchase_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_addons');
    }
};
