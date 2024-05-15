<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CAr>
 */
class CarFactory extends Factory
{
    public function definition(): array
    {
        return [
            'number' => mt_rand(1, 5),
            'booking_status' => false,
            'model' => fake()->numerify,
            'user_id' => fake()->numberBetween(1, 5),
        ];
    }
}
