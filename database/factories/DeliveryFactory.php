<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(2),  // Example: "Fast Delivery"
            'status' => fake()->randomElement(['planned', 'active', 'processing', 'delivered']),
            'order_deadline' => fake()->optional()->dateTimeBetween('now', '+1 month'),
            'price' => fake()->randomFloat(2, 10, 100),
            'weight' => fake()->randomFloat(1, 0.5, 20),
            'address' => fake()->address(),
        ];
    }
}
