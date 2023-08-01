<?php

namespace Database\Factories;

use App\Models\ReadyProjectDepartment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReadyProject>
 */
class ReadyProjectFactory extends Factory
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
            'price' => fake()->randomFloat(min: 500, max: 10000),
            'marketing_discount_ratio' => fake()->numberBetween(0, 100),
            'description' => [
                'ar' => 'براجراف',
                'en' => fake()->paragraph(),
            ],
            'body' => [
                'ar' => 'براجراف',
                'en' => fake()->paragraph(),
            ],
            'image' => fake()->imageUrl(),
            'link' => fake()->url(),
            'num_of_purchases' => intval(fake()->randomNumber()),
            'is_offered' => fake()->randomNumber() % 2,
            'ready_project_department_id' => ReadyProjectDepartment::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
