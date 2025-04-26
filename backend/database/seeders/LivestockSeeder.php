<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivestockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseUrl = env('APP_URL', 'http://localhost:8000');

        // List of livestock with image URLs
        $livestocks = [
            [
                'name' => 'Dairy Cow',
                'age' => 4,
                'type' => 'Dairy',
                'health_status' => 'Healthy',
                'image_url' => "{$baseUrl}/storage/livestock_images/cow.jpg"
            ],
            [
                'name' => 'Goat',
                'age' => 3,
                'type' => 'Meat',
                'health_status' => 'Healthy',
                'image_url' => "{$baseUrl}/storage/livestock_images/goat.jpg"
            ],
            [
                'name' => 'Chicken',
                'age' => 1,
                'type' => 'Layer',
                'health_status' => 'Sick',
                'image_url' => "{$baseUrl}/storage/livestock_images/chicken.jpg"
            ],
            [
                'name' => 'Sheep',
                'age' => 2,
                'type' => 'Wool',
                'health_status' => 'Healthy',
                'image_url' => "{$baseUrl}/storage/livestock_images/sheep.jpg"
            ],
            [
                'name' => 'Pig',
                'age' => 5,
                'type' => 'Meat',
                'health_status' => 'Injured',
                'image_url' => "{$baseUrl}/storage/livestock_images/pig.jpg"
            ],
            [
                'name' => 'Duck',
                'age' => 1,
                'type' => 'Eggs',
                'health_status' => 'Healthy',
                'image_url' => "{$baseUrl}/storage/livestock_images/duck.jpg"
            ],
            [
                'name' => 'Horse',
                'age' => 6,
                'type' => 'Riding',
                'health_status' => 'Fit',
                'image_url' => "{$baseUrl}/storage/livestock_images/horse.jpg"
            ],
            [
                'name' => 'Rabbit',
                'age' => 2,
                'type' => 'Pet',
                'health_status' => 'Healthy',
                'image_url' => "{$baseUrl}/storage/livestock_images/rabbit.jpg"
            ],
            [
                'name' => 'Turkey',
                'age' => 1,
                'type' => 'Meat',
                'health_status' => 'Sick',
                'image_url' => "{$baseUrl}/storage/livestock_images/turkey.jpg"
            ],
            [
                'name' => 'Buffalo',
                'age' => 7,
                'type' => 'Dairy',
                'health_status' => 'Strong',
                'image_url' => "{$baseUrl}/storage/livestock_images/buffalo.jpg"
            ],
        ];

        // Insert data into the `livestocks` table
        DB::table('livestocks')->insert($livestocks);
    }
}
