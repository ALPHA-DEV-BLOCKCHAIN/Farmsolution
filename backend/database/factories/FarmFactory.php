<?php

namespace Database\Factories;

use App\Models\Farm;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Farm>
 */
class FarmFactory extends Factory
{
    /**
     * The name of the model that the factory corresponds to.
     *
     * @var string
     */
    protected $model = Farm::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Generates a user and links it
            'name' => $this->faker->company(), // Fake farm name
            'location' => $this->faker->city(), // Fake city location
            'size' => $this->faker->randomFloat(2, 1, 100), // Random size (1 to 100 hectares)
            'type' => $this->faker->randomElement(['crop', 'livestock', 'mixed']), // Random farm type
        ];
    }
}
