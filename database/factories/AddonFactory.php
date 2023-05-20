<?php

namespace Database\Factories;

use App\Models\AddonType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Addon>
 */
class AddonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => fake()->randomFloat(),
            'name' => [
                'ar' => 'اسم',
                'en' => fake()->unique()->name(),
            ],
            'addon_type_id' => AddonType::inRandomOrder()->first()->id,
        ];
    }
}
