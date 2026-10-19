<?php

namespace Database\Factories;

use App\Models\Congregation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Congregation>
 */
class CongregationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->unique()->company(),
            'address' => fake()->address(),
            'phone_number' => fake()->phoneNumber(),

        ];
    }
}
