<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materia>
 */
class MateriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
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
            'areaConocimiento' => $this->faker->randomElement($electivas),

        ];
    }
}
