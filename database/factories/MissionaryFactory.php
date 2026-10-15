<?php

namespace Database\Factories;

use App\Models\Missionary;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<Missionary>
 */
class MissionaryFactory extends Factory
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
            'password' => Hash::make('password'),
            'age' => fake()->numberBetween(18, 65),
            'address' => fake()->address(), 
            'phone_number' => fake()->phoneNumber(), 
            'civil_status' => fake()->randomElement(['single', 'married', 'divorced', 'widowed']),
            'gender' => fake()->randomElement(['male', 'female']),
            'congregation' => fake()->randomElement(['Congregation A', 'Congregation B', 'Congregation C'])
        ];
    }
}
