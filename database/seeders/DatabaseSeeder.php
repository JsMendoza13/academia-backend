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
        Estudiante::factory()->times(15)->create();
        Materia::factory()->times(8)->create()->each(function ($materia) {
            $materia->estudiantes()->sync(
                Estudiante::all()->random(2)
            );
        });


        /*/ $estudiantesAleatorios = Estudiante::all()->random(24);

        Materia::factory()->times(8)->create()->each(function ($materia, $i) use ($estudiantesAleatorios) {
            $materia->estudiantes()->attach(
                $estudiantesAleatorios->slice($i * 3, 3)
            );
        });
        Maestro::factory()->times(6)->create();
            */

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
