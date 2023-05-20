<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankCard>
 */
class BankCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'iban' => fake()->randomKey(),
            'account_number' => fake()->randomNumber(),
            'bank_name' => [
                'ar' => 'اسم',
                'en' => fake()->unique()->name(),
            ],
        ];
    }
}
