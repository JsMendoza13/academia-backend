<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Estudiante;
use App\Models\Maestro;
use App\Models\Materia;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        Materia::factory()->times(8)->create();
        Estudiante::factory()->times(25)->create(); /*Se crean 25 datos de estudiantes*/
        Maestro::factory()->times(8)->create(); /*Se crean 8 datos de maestros*/
    }
}
