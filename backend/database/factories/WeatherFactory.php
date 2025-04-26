<?php

namespace Database\Factories;

use App\Models\Farm;
use App\Models\Weather;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Weather>
 */
class WeatherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Weather::class; // ✅ Explicitly define the model

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'farm_id' => Farm::factory(), // ✅ Generates a farm first
            'temperature' => $this->faker->randomFloat(2, 10, 40), // ✅ Uses $this->faker
            'rainfall' => $this->faker->randomFloat(2, 0, 50),
            'forecast' => $this->faker->randomElement(['sunny', 'rainy', 'cloudy', 'stormy']),
        ];
    }
}
