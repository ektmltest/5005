<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectState>
 */
class ProjectStateFactory extends Factory
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
                'ar' => 'اسم',
                'en' => fake()->unique()->name(),
            ],
            'icon' => 'bx bx-alarm',
            'unicode' => 'f15b',
            'color' => fake()->randomElement(['warning', 'dark', 'secondary', 'info', 'danger', 'success'])
        ];
    }
}
