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
        // $faker = Factory::create('pt_BR');

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$sCUtOkRlHQ8S7vbjhmZh1O2ihtdD8HxLMl4uAjGjGUahc70VOrnuO', // password
            'username' => $this->faker->unique()->name(),
            'cargo' => $this->faker->realText($this->faker->numberBetween(10, 20)),
            'sede' => $this->faker->realText($this->faker->numberBetween(10, 20)),
            'matricula' => $this->faker->unique()->randomNumber(8),
            'cpf' => $this->faker->unique()->numerify('###########'),
            'tipo' => $this->faker->randomElement([1, 2]),
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
