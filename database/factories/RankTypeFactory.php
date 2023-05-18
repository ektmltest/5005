<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RankType>
 */
class RankTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = [
            ['ar' => 'مالك', 'en' => 'owner'],
            ['ar' => 'إدارية', 'en' => 'staff'],
            ['ar' => 'عضو', 'en' => 'member'],
            ['ar' => 'افتراضية', 'en' => 'default'],
        ];

        return [
            'name' => json_encode($this->faker->randomElement($names)),
        ];
    }
}
