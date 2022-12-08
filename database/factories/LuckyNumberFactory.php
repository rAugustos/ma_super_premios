<?php

namespace Database\Factories;

use App\Models\LuckyNumber;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LuckyNumber>
 */
class LuckyNumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => LuckyNumber::generateNumber(),
            'user_id' => 1,
            'product_id' => 1,
        ];
    }
}
