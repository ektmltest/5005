<?php
namespace Database\Factories;

use App\Models\MarketingLevel;
use App\Models\Rank;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        $random_rank = Rank::inRandomOrder()->first();
        return [
            'fname' => fake()->name(),
            'lname' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->regexify('01[0125][0-9]{8}'),
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'), // 123456789
            'remember_token' => Str::random(10),
            'state' => fake()->randomElement(['pending', 'activated', 'blocked']),
            'rank_id' => $random_rank->id,
            'avatar' => fake()->imageUrl(),
            'balance' => fake()->randomFloat(min: 500, max: 10000),
            'marketing_level_id' => \Str::contains($random_rank->key, 'market') ? MarketingLevel::inRandomOrder()->first()->id : null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
