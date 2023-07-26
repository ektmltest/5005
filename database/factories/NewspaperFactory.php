<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Newspaper>
 */
class NewspaperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => [
                'en' => fake()->name(),
                'ar' => 'عنوان'
            ],
            'slug' => fake()->slug(),
            'body' => [
                'en' => fake()->sentence(),
                'ar' => 'براجراف',
            ],
            'image' => fake()->imageUrl(),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
