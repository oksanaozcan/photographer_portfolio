<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'name' => $this->faker->name(),
          'phone' => $this->faker->unique()->phoneNumber(),
          'location' => $this->faker->streetAddress(),
          'email' => $this->faker->email()
        ];
    }
}