<?php

namespace Database\Factories;

use App\Models\Crop;
use App\Models\Farm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crop>
 */
class CropFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Crop::class; // ✅ Define the model explicitly

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'farm_id' => Farm::factory(), // Link to a farm
            'type' => $this->faker->randomElement(['maize', 'wheat', 'coffee', 'beans']), // ✅ Use $this->faker instead of fake()
            'planting_date' => $this->faker->date(), 
            'harvest_date' => $this->faker->date(), 
            'expected_yield' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
