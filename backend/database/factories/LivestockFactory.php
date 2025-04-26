<?php

namespace Database\Factories;

use App\Models\Farm;
use App\Models\Livestock;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivestockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Livestock::class; // ✅ Define the model

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'farm_id' => Farm::factory(), // Link to a farm
            'type' => fake()->randomElement(['cow', 'goat', 'chicken', 'sheep']), // ✅ Use fake() instead of $this->faker
            'breed' => fake()->word(), // ✅ Complete the breed field
            'quantity' => fake()->numberBetween(1, 100), // ✅ Quantity between 1 and 100
            'health_status' => fake()->randomElement(['healthy', 'sick']),
        ];
    }
}
