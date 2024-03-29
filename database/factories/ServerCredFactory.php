<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServerCred>
 */
class ServerCredFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "ip_address" => $this->faker->word,
            "domain_name" => $this->faker->word,
            "username" => $this->faker->word,
            "password" => $this->faker->word,
        ];
    }
}
