<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    public $table = "materias";
    protected $fillable = array("*");

    public function estudiantes()
    {
        return $this->belongsToMany(
            Estudiante::class,
            "materia_estudiante",
            'estudiante_id',
            'materia_id'
        );
    }
}
