<?php

namespace Database\Factories;

use App\Models\BankCard;
use App\Models\ReadyProject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'state' => fake()->randomElement(config('globals.payment_states')),
            'invoice_image' => fake()->imageUrl(),
            'invoice_amount' => fake()->randomFloat(),
            'user_id' => User::inRandomOrder()->first()->id,
            'bank_card_id' => BankCard::inRandomOrder()->first()->id,
        ];
    }
}
