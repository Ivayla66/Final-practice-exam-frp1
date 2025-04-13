<?php

namespace Database\Factories;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class DeliveryFactory extends Factory
{
    protected $model = Delivery::class;

    /**
     * @return array
     */
    #[ArrayShape([
        'code' => "string",
        'description' => "string",
        'price_at_purchase' => "float",
        'status' => "'planned'|'active'|'processing'|'delivered'",
        'order_deadline' => "\DateTime|null",
        'payed_at' => "\DateTime|null",
        'created_at' => "\DateTime",
        'updated_at' => "\DateTime"
    ])]
    public function definition(): array
    {
        return [
            'code' => 'DEL-' . $this->faker->unique()->randomNumber(4),
            'description' => $this->faker->sentence(10),
            'price_at_purchase' => $this->faker->randomFloat(2, 10, 1000),
            'status' => $this->faker->randomElement(['planned', 'active', 'processing', 'delivered']),
            'order_deadline' => $this->faker->optional(0.7)->dateTimeBetween('now', '+1 year'),
            'payed_at' => $this->faker->optional(0.3)->dateTimeThisYear(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now')
        ];
    }

    // Optional: State methods for specific scenarios
    public function planned(): static
    {
        return $this->state(['status' => 'planned']);
    }

    /**
     * @return $this
     */
    public function active(): static
    {
        return $this->state(['status' => 'active']);
    }
}
