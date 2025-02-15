<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarFeature;
use App\Models\User;
use App\Models\CarImage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Car::factory(5)->create();

        Car::factory(5)
            ->has(CarImage::factory()->count(3), 'images')
            ->has(User::factory()->count(5), 'favouriteUsers')
            ->has(CarFeature::factory(), 'carFeature')
            ->create();
    }
}
