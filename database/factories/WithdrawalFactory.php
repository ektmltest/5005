<?php

namespace Database\Factories;

use App\Models\UserBankCard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WithdrawalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_amount' => fake()->randomFloat(),
            'state' => fake()->randomElement(config('globals.payment_states')),
            'user_bank_card_id' => UserBankCard::inRandomOrder()->first()->id,
        ];
    }
}
