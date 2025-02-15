<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarFeature>
 */
class CarFeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Air_Conditioning' => fake()->randomElement(['on', null]),
            'Power_Windows' => fake()->randomElement(['on', null]),
            'Power_DoorLocks' => fake()->randomElement(['on', null]),
            'ABS' => fake()->randomElement(['on', null]),
            'Cruise_Control' => fake()->randomElement(['on', null]),
            'Bluetooth_Connectivity' => fake()->randomElement(['on', null]),
            'Remote_Start' => fake()->randomElement(['on', null]),
            'GPS' => fake()->randomElement(['on', null]),
            'Heated_Seats' => fake()->randomElement(['on', null]),
            'Rear_ParkingSensors' => fake()->randomElement(['on', null]),
            'Leather_Seats' => fake()->randomElement(['on', null]),
            'Climate_Control' => fake()->randomElement(['on', null]),
        ];
    }
}
