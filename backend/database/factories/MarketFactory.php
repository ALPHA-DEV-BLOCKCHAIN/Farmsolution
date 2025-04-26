<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Market;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Market::class; // ✅ Define the model

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Link to a user
            'product_name' => fake()->word(), // ✅ Use fake() instead of $this->faker
            'price' => fake()->randomFloat(2, 100, 10000), // ✅ Price between 100 and 10,000
            'quantity' => fake()->numberBetween(1, 100), // ✅ Quantity between 1 and 100
            'status' => fake()->randomElement(['available', 'sold']), // ✅ Random product status
        ];
    }
}
