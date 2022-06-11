<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [         
          'description' => $this->faker->text(),
          'convenient_date' => $this->faker->dateTimeBetween('+2 days', '+30 days'),
          'convenient_time' => $this->faker->time(),
          'customer_id' => Customer::factory()->create()
        ];
    }
}
