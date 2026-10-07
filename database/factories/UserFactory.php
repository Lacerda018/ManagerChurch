<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

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
            'congregation' => fake()->randomElement(['Congregation A', 'Congregation B', 'Congregation C']),
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
