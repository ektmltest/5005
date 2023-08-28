<?php

namespace Database\Factories;

use App\Models\ReadyProject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'token' => Str::random(32),
            'num_of_transactions' => fake()->numberBetween(1, 500),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
