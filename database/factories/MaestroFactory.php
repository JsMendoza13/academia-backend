<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MaestroFactory extends Factory
{

    public function definition(): array
    {
        return [
            /**Se crean datos random por medio de faker */
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'telefono' => $this->faker->e164phoneNumber(),
            'direccion' => $this->faker->address(),
            'ciudad' => $this->faker->city(),
            'id_materias' => $this->faker->numberBetween(1, 8),
        ];
    }
}
