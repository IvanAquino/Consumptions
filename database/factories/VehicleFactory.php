<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model' => $this->faker->word,
            'brand' => $this->faker->word,
            'year' => $this->faker->year,
            'color' => $this->faker->word,
            'plate' => $this->faker->word,
            'initial_mileage' => $this->faker->numberBetween(0, 100000),
            'current_mileage' => $this->faker->numberBetween(0, 100000),
            'team_id' => \App\Models\Team::factory(),
        ];
    }
}
