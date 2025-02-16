<?php

namespace Database\Seeders;

use App\Models\Boy;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BoySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Boy::factory(10)->create();
    }
}
