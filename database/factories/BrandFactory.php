<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->company(),
            'legal_name' => fake()->unique()->company(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => 'California',
            'country' => fake()->country(),
            'postal_code' => '08019',
        ];
    }
}
