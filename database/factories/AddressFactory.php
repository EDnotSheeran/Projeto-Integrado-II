<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'state' => $this->faker->state(),
            'street' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'district' => $this->faker->city(),
            'zipcode' => $this->faker->postcode(),
            'number' => $this->faker->numberBetween(1, 100),
        ];
    }
}
