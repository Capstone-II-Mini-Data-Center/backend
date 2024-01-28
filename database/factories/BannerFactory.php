<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'description' => $this->faker->text,
            'banner_image' => $this->faker->imageUrl($width = 640, $height = 480),
            "published" => $this->faker->boolean,
            'created_at' => now()->subDays(rand(1, 30)), // Custom created_at timestamp
            'updated_at' => now(),
        ];
    }
}
