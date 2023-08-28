<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MarketingLevel>
 */
class MarketingLevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'priority' => fake()->numberBetween(1, 1000),
            'max_transactions' => fake()->numberBetween(5, 25),
            'benefit_ratio' => fake()->randomFloat(nbMaxDecimals: 2, min: 10, max: 100),
        ];
    }
}
