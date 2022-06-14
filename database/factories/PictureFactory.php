<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Picture>
 */
class PictureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'title' => $this->faker->sentence(3),
          'url' => $this->faker->imageUrl(),
          'size' => $this->faker->numberBetween(50, 300),
          'description' => $this->faker->text(),
          'theme_id' => $this->faker->numberBetween(1, 10),
          'order_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
