<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GalleryProjectType>
 */
class GalleryProjectTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key' => fake()->unique()->slug(),
            'name' => [
                'ar' => 'اسم',
                'en' => fake()->unique()->name(),
            ],
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
