<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = [
            ['ar' => 'تعديل الصفحة الرئيسية', 'en' => 'edit the home page'],
            ['ar' => 'x', 'en' => 'y'],
        ];
        return [
            'name' => $this->faker->randomElement($names),
        ];
    }
}
