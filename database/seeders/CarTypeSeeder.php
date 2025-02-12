<?php

namespace Database\Seeders;

use App\Models\CarType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarType::create([
            'name' => 'Sedan'
        ]);
        CarType::create([
            'name' => 'Hatchback'
        ]);
        CarType::create([
            'name' => 'SUV (Sport Utility Vehicle)'
        ]);

    }
}
