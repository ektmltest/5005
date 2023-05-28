<?php

namespace Database\Factories;

use App\Models\GalleryProjectType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GalleryProject>
 */
class GalleryProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => [
                'ar' => 'براجراف',
                'en' => fake()->paragraph(),
            ],
            'image' => fake()->imageUrl(),
            'user_id' => User::inRandomOrder()->first()->id,
            'gallery_type_id' => GalleryProjectType::inRandomOrder()->first()->id,
        ];
    }
}
