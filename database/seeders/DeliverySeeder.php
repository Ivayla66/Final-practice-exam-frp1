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
        \App\Models\Delivery::factory(10)->create();
    }
}
