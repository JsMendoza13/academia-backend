<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{

    public function definition(): array
    {
        /**Se crean datos random por medio de faker */
        return [
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'telefono' => $this->faker->e164phoneNumber(),
            'direccion' => $this->faker->address(),
            'ciudad' => $this->faker->city(),
            'semestre' => $this->faker->numberBetween(1, 9),
            'nota' => $this->faker->randomFloat(1, 0.0, 5.0),
            'id_materias' => $this->faker->numberBetween(1, 8),
        ];
    }
}
