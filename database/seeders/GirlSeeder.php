<?php

namespace Database\Seeders;

use App\Models\Girl;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GirlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Girl::factory(10)->create();
    }
}
