<?php

namespace Database\Factories;

use App\Models\ReadyProject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MarketingCoupon>
 */
class MarketingCouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key' => fake()->randomNumber(),
            'num_of_transactions' => fake()->numberBetween(1, 500),
            'ready_project_id' => ReadyProject::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
