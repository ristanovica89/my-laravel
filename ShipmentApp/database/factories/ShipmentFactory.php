<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipment>
 */
class ShipmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),

            'from_city' => $this->faker->city(),
            'from_country' => $this->faker->country(),

            'to_city' => $this->faker->city(),
            'to_country' => $this->faker->country(),

            'price' => $this->faker->randomFloat(2, 50, 5000),

            'status' => $this->faker->randomElement(Shipment::STATUSES),

            'details' => $this->faker->paragraph(),

            'user_id' => User::factory(),
        ];
    }
}
