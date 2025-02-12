<?php

namespace Database\Seeders;

use App\Models\CarModel;
use App\Models\Maker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 4; $i++) {
            CarModel::create([
                'name' => fake()->randomElement(['2000', '2001', '2003', '2010']),
                'maker_id' => fake()->randomElement([1, 2, 3, 4, 5]),
            ]);
        }
    }
}
