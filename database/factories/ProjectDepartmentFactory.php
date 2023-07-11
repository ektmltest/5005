<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectDepartment>
 */
class ProjectDepartmentFactory extends Factory
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
            'icon' => fake()->slug(),
            'unicode' => 'f15b',
        ];
    }
}
