<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        // Create 10 random deliveries
        Delivery::factory()
            ->count(8)
            ->create();

        // Create 2 specific status deliveries
        Delivery::factory()
            ->count(1)
            ->planned()
            ->create();

        Delivery::factory()
            ->count(1)
            ->active()
            ->create();
    }
}
