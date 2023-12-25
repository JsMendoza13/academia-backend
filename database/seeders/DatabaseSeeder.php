<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Estudiante;
use App\Models\Maestro;
use App\Models\Materia;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Estudiante::factory()->times(15)->create(); /*Se crean 15 datos de estudiantes*/
        Maestro::factory()->times(6)->create(); /*Se crean 6 datos de maestros*/
        Materia::factory()->times(8)->create()->each(function ($materia) {
            $materia->estudiantes()->sync(
                Estudiante::all()->random(3),
                /*Se crean 8 materias y se le asigna de a 3 de manera random a los estudiantes*/
            );
        });
        /**Se asignan maestros a materias que no tengan asignados maestros*/
        foreach (Materia::all() as $materia) {
            if (!$materia->maestros()->exists()) {
                $materia->maestros()->attach(
                    Maestro::factory()->create()->id
                );
            }
        }
    }
}
