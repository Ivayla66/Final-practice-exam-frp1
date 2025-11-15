<?php

namespace Database\Factories;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class DeliveryFactory extends Factory
{
    protected $model = Delivery::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'status' => $this->faker->randomElement(['planned', 'active', 'processing', 'delivered']),
            'order_deadline' => $this->faker->optional()->dateTimeBetween('now', '+1 month'),
        ];
    }
}
