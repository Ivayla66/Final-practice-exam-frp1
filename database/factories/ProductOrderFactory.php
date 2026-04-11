<?php

namespace Database\Factories;

use App\Models\Delivery;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductOrderFactory extends Factory
{
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first();

        return [
            'code' => $product?->code ?? $this->faker->word(),
            'description' => $product?->description ?? $this->faker->sentence(),
            'price_at_purchase' => ($product?->current_price ?? $this->faker->randomFloat(2, 5, 100))
                + $this->faker->randomFloat(0, -10, 10),
            'payed_at' => $this->faker->boolean
                ? $this->faker->dateTimeBetween('-6 months', 'now')
                : null,
            'delivery_id' => Delivery::query()->inRandomOrder()->value('id'),
        ];
    }
}
