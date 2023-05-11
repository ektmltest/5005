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
        Schema::create('rank_permissions', function (Blueprint $table) {
            $table->timestamps();

            // foreign keys
            $table->foreignId('rank_id')->constrained('ranks');
            $table->foreignId('permission_id')->constrained('permissions');

            // constrains
            $table->primary(['rank_id', 'permission_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rank_permissions');
    }
};
