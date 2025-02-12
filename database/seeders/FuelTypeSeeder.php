<?php

namespace Database\Seeders;

use App\Models\FuelType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FuelType::create([
            'name' => 'Gasoline'
        ]);
        FuelType::create([
            'name' => 'Diesel'
        ]);
        FuelType::create([
            'name' => 'Electric'
        ]);
        FuelType::create([
            'name' => 'Hybrid'
        ]);
    }
}
