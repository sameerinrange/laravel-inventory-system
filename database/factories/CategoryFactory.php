<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'name' => fake()->word(),
            'slug' => fake()->slug(), // Ensure slug is correctly formatted
            'code' => strtoupper(fake()->bothify('CAT')), // Example: CAT123
            'user_id' => 1, // Default to SuperAdmin or update as needed
            'status' => fake()->randomElement(['active']),
        ];


    }
}
