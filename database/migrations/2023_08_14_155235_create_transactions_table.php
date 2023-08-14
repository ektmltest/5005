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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('tran_ref')->unique();
            $table->text('description');
            $table->string('currency');
            $table->double('amount', places: 2);

            // $table->string('customer_name');
            // $table->string('customer_email');
            // $table->string('customer_phone');
            // $table->text('customer_street1');
            // $table->text('customer_street2')->nullable();
            // $table->string('customer_city');
            // $table->string('customer_state');
            // $table->string('customer_country');
            // $table->string('customer_ip');

            // $table->string('response_status');
            // $table->string('response_code');
            // $table->string('response_message');

            // $table->string('info_card_type');
            // $table->string('info_card_scheme');
            // $table->string('info_payment_description');

            // $table->timestamp('transaction_time');
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
