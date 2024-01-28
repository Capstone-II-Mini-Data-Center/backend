<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => fake()->name(),
            // 'email' => fake()->unique()->safeEmail(),
            // 'phone_number' => $this->faker->phoneNumber,
            // 'password' => static::$password ??= Hash::make('password'),
            // 'role' => $this->getRandomRole(["admin", "user"]),
            "name" => "Admin",
            "email" => "admin@cloudbloc.com",
            "phone_number" => "011222333",
            "password" => "12345678",
            "role" => "Admin",
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now()->subDays(rand(1, 30)), // Custom created_at timestamp
            'updated_at' => now(),
        ];
    }

    protected function getRandomRole($strings)
    {
        $randomIndex = array_rand($strings);
        return $strings[$randomIndex];
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
