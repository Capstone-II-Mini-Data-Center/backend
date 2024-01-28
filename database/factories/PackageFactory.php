<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => $this->faker->text,
            // 2 decimal and pirce between 10 to 1000 $this->faker->word
            "price" => $this->faker->randomFloat(2, 10, 1000),
            'cpu' => $this->faker->word,
            'memory' => $this->faker->word,
            'storage' => $this->faker->word,
            "recommended" => $this->faker->boolean,
            'created_at' => now()->subDays(rand(1, 30)), // Custom created_at timestamp
            'updated_at' => now(),
        ];
    }
}
