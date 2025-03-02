<?php

namespace Database\Factories;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'slug' => fake()->slug(),
            'code' => $this->faker->unique()->ean13(), // Generates a random barcode
            'quantity' => $this->faker->numberBetween(10, 200),
            'buying_price' => $this->faker->numberBetween(100, 500),
            'selling_price' => $this->faker->numberBetween(500, 1000),
            'quantity_alert' => $this->faker->numberBetween(5, 20),
            'tax' => fake()->randomElement([5,10,15,20,25]),
            'tax_type' => fake()->randomElement([1,2]),
            'notes' => $this->faker->sentence(),
            'product_image' => $this->faker->imageUrl(300, 300, 'technics'),
            'user_id' => User::inRandomOrder()->value('id') ?? 1, // Assigns a random user ID
            'category_id' => fake()->randomElement([1, 2, 3, 4, 5]),
            'unit_id' => fake()->randomElement([1, 2, 3]),
            'status' => $this->faker->randomElement(['active', 'inactive', 'deleted']),
        ];


    }
}
