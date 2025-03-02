<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         


        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->phoneNumber(),
            'address' => fake()->address(),
            'photo' => fake()->imageUrl(200, 200, 'people'), // Generates a random image URL
            'account_holder' => fake()->name(),
            'account_number' => fake()->numberBetween(10000000, 99999999),
            'bank_name' => fake()->company(),
            'user_id' => User::inRandomOrder()->value('id') ?? 1, // Assigns a random user ID
            'status' => fake()->randomElement(['active' ]),
        ];
    }
}
