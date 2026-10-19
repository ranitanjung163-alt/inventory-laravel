<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'sku' => strtoupper(fake()->unique()->bothify('SKU-####')),
            'name' => fake()->words(3, true),
            'price' => fake()->randomFloat(2, 1000, 2000000),
            'stock' => fake()->numberBetween(0, 100),
            'minimum_stock' => 5,
        ];
    }
}
