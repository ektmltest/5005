<?php

namespace Database\Factories;

use App\Models\QasType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Qas>
 */
class QasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => [
                'en' => $this->faker->sentence,
                'ar' => 'سؤال؟',
            ],
            'answer' => [
                'en' => $this->faker->sentence,
                'ar' => 'إجابة؟',
            ],
            'user_id' => User::inRandomOrder()->first()->id,
            'type_id' => QasType::inRandomOrder()->first()->id,
        ];
    }
}
