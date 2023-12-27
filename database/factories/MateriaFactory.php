<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class MateriaFactory extends Factory
{

    public function definition(): array
    {
        $asignaturas = ['Matemáticas', 'Física', 'Historia', 'Programación', 'Literatura', 'Biología', 'Ingles', 'Matemáticas 2'];

        $electivas = ['Electiva', 'Obligatoria'];


        return [
            /**Se crean datos random por medio de faker */
            'nombre' => $this->faker->unique()->randomElement($asignaturas),
            'descripcion' => $this->faker->sentence(3),
            'credito' => $this->faker->randomDigit(),
            'horas' => rand(100, 900),
            'areaConocimiento' => $this->faker->sentence(2),
            'electiva' => $this->faker->randomElement($electivas)

        ];
    }
}
