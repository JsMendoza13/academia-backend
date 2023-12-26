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
            'telefono' => $this->faker->phoneNumber(),
            'direccion' => $this->faker->address(),
            'ciudad' => $this->faker->city(),
            'semestre' => $this->faker->randomDigit(),
            'credito' => $this->faker->randomDigit(),
            'nota' => $this->faker->randomFloat(1, 0.0, 5.0),

        ];
    }
}
