<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), // Generate a fake name
            'email' => fake()->unique()->safeEmail(), // Generate a unique fake email
            'email_verified_at' => now(), // Set email verification timestamp to now
            'password' => static::$password ??= Hash::make('password'), // Default password is "password"
            'role' => fake()->randomElement(['farmer', 'buyer', 'admin', 'expert']), // Random role
            'phone_number' => fake()->phoneNumber(), // Generate a fake phone number
            'location' => fake()->city(), // Generate a fake city name
            'remember_token' => Str::random(10), // Generate a random remember token
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null, // Set email_verified_at to null
        ]);
    }
}