<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unit_id' => fake()->numberBetween(1, 20),
            'category_id' => fake()->numberBetween(1, 20),
            'type_id' => fake()->numberBetween(1, 20),
            'item_name' => fake()->unique()->word(),
            'image' => fake()->image(),
            'description' => fake()->sentence(),
            'cost' => fake()->randomFloat(2, 0, 100),
            'stock' => 0,
            'stock_used_per_day' => fake()->numberBetween(0, 100),
            'created_at' => now(),
            'created_by' => fake()->numberBetween(1,2),
        ];
    }
}
