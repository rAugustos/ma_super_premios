<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'price' => fake()->randomFloat(3, 3, 3),
            'share_price' => fake()->randomFloat(3, 3, 3),
            'share_lot_price' => fake()->randomFloat(3, 3, 3)
        ];
    }
}
