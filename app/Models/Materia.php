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
        'areaConocimiento',
        'electiva'
    ];
}
