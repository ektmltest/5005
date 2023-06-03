<?php

namespace Database\Factories;

use App\Models\ProjectCategory;
use App\Models\ProjectState;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name(),
            'description' => fake()->paragraph(),
            'progress' => fake()->numberBetween(0, 100),
            'user_id' => User::inRandomOrder()->first()->id,
            // 'project_category_id' => ProjectCategory::inRandomOrder()->first()->id,
            'project_state_id' => ProjectState::inRandomOrder()->first()->id,
        ];
    }
}
