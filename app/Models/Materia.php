<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    public $table = "materias";
    protected $fillable = [
        'nombre',
        'descripcion',
        'credito',
        'horas',
        'areaConocimiento'
    ];

    public function estudiantes()
    {
        return $this->belongsToMany(
            Estudiante::class,
            "estudiante_materia"
        );
    }
    public function maestros()
    {
        return $this->belongsToMany(
            Maestro::class,
            "maestro_materia"
        );
    }
}
