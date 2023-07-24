<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->string('country_code')->default('+20');
            $table->enum('state', config('globals.user_states'))->default('pending');
            $table->string('avatar')->nullable();
            $table->double('balance')->default(0);
            $table->integer('visits')->default(0);
            $table->rememberToken();
            $table->timestamps();

            // foreign keys
            $table->foreignId('rank_id')->constrained('ranks')->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
