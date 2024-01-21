<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageUserFactory extends Factory
{
    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "domain_name" => fake()->text,
            "username" => $this->faker->word,
            'password' => static::$password ??= Hash::make('password'),
            "ip_address" => $this->faker->word,
            "payment_image" => $this->faker->word,
            "status" => $this->getRandomStatus(["reviewing", "in progress", "delivered"]),
            "expire_date" => now()->addDays(30),
            'created_at' => now()->subDays(rand(1, 30)), // Custom created_at timestamp
            'updated_at' => now(),
        ];
    }

    protected function getRandomStatus($strings)
    {
        $randomIndex = array_rand($strings);
        return $strings[$randomIndex];
    }
}
