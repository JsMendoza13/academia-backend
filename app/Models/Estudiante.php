<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Estudiante extends Model
{
    use HasFactory;

    public $table = "estudiantes";
    protected $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'direccion',
        'ciudad',
        'semestre',
        'nota',
        'id_materias'

    ];
}
