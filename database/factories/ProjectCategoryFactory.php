<?php

namespace Database\Factories;

use App\Models\ProjectDepartment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectCategory>
 */
class ProjectCategoryFactory extends Factory
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
            'color' => fake()->randomElement(['warning', 'dark', 'secondary', 'info', 'danger', 'success']),
            'start_price' => fake()->randomFloat(min: 100, max: 5000),
            'project_department_id' => ProjectDepartment::inRandomOrder()->first()->id,
        ];
    }
}
