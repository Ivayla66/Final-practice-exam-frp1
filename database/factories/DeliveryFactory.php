<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    public function definition()
    {
        $statuses = ['planned', 'active', 'processing', 'delivered'];

        return [
            'code' => 'DEL-' . $this->faker->unique()->randomNumber(5),
            'description' => $this->faker->sentence(10),
            'price_at_purchase' => $this->faker->randomFloat(2, 10, 1000),
            'payed_at' => $this->faker->optional(0.3)->dateTimeThisYear(),
            'status' => $this->faker->randomElement($statuses),
            'order_deadline' => $this->faker->optional(0.7)->dateTimeBetween('now', '+1 year')
        ];
    }
}
