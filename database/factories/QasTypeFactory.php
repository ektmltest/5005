<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QasType>
 */
class QasTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'en' => $this->faker->name(),
                'ar' => 'اسم',
            ],
            'icon' => 'bx bx-globe',
            'unicode' => 'f0ac',
            'key' => $this->faker->unique()->slug(),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
