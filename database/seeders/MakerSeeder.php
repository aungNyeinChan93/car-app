<?php

namespace Database\Seeders;

use App\Models\Maker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Maker::create([
            'name' => 'BMW'
        ]);
        Maker::create([
            'name' => 'Toyota'
        ]);
        Maker::create([
            'name' => 'Audi'
        ]);
        Maker::create([
            'name' => 'Ford'
        ]);
        Maker::create([
            'name' => 'Ferrari'
        ]);

    }
}
