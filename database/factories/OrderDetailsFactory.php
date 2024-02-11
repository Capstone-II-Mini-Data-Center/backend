<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetails>
 */
class OrderDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "unit_price" => $this->faker->randomFloat(2, 10, 1000),
            "discount_amount" => $this->faker->randomFloat(2, 10, 1000),
            "total_amount" => $this->faker->randomFloat(2, 10, 1000),
            "plan" => $this->faker->word,
            "expired_date" => now()->addDays(2)
        ];
    }
}
