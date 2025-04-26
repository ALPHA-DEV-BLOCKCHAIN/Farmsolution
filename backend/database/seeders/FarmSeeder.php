<?php

namespace Database\Seeders;

use App\Models\Farm;
use Illuminate\Database\Seeder;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create 10 fake farms using the FarmFactory
        Farm::factory()->count(10)->create();
    }
}