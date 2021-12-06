<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'password' => '$2y$10$sCUtOkRlHQ8S7vbjhmZh1O2ihtdD8HxLMl4uAjGjGUahc70VOrnuO', // 12345678
            'registration_number' => $this->faker->unique()->randomNumber(8),
            'cpf' => $this->faker->unique()->numerify('###########'),
            'role' => $this->faker->randomElement(['admin', 'default']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
