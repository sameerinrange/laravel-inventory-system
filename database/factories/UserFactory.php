<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'username' => preg_replace('/[^A-Za-z0-9_]/', '', fake()->userName()),
            'shop_name' => fake()->company(),
            'phone' => fake()->phoneNumber(),
            'alternate_phone' => fake()->phoneNumber(),
            'address_line_1' => fake()->streetAddress(),
            'address_line_2' => fake()->secondaryAddress(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'zip_code' => fake()->postcode(),
            'country' => fake()->country(),
            'role' => 'Shop',
            'parent_id' => null, 
            'status' => 'active', 
            'photo' => fake()->imageUrl(200, 200, 'people'),
            'shop_logo' => fake()->imageUrl(200, 200, 'business'),
            'shop_banner' => fake()->imageUrl(200, 200, 'business'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
