<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Platform>
 */
class PlatformFactory extends Factory
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
            'link' => $this->faker->url(),
            'icon' => 'bx bx-globe',
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
