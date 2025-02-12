<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'maker_id' => 1,
            'user_id' => User::factory(),
            'car_model_id' => 3,
            'car_type_id' => 1,
            'fuel_type_id' => 2,
            'region' => fake()->text(),
            'price' => fake()->randomDigitNotZero(),
            'address' => fake()->paragraph(),
            'contact' => fake()->phoneNumber(),
            'description' => fake()->text(),
            'publish_date' => Carbon::now()->format('d-m-Y'),
            'deleted_at' => null
        ];
    }
}
