<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText(50),
            'start_date' => $this->faker->dateTimeBetween('-30 days', '-1 days'),
            'start_time' => $this->faker->time('H:i:s'),
            'end_date' => $this->faker->dateTimeBetween('now', '+30 days'),
            'end_time' => $this->faker->time('H:i:s'),
            'speaker_name' => $this->faker->name(),
            'available_vacancies' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->realText(400),
            'status' => true,
            'method' => $this->faker->boolean(50) == 1,
            'image_url' => $this->faker->imageUrl(640, 480, 'cats'),
        ];
    }
}
