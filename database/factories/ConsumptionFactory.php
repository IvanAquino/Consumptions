<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consumption>
 */
class ConsumptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mileage' => $this->faker->numberBetween(1000, 100000),
            'previous_mileage' => $this->faker->numberBetween(1000, 100000),
            'fuel_quantity' => $this->faker->numberBetween(10, 100),
            'fuel_price' => $this->faker->numberBetween(10, 100),
            'vehicle_id' => \App\Models\Vehicle::factory(),
        ];
    }
}
