<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CetificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(400),
            'image_url' => $this->faker->imageUrl(),
        ];
    }
}
