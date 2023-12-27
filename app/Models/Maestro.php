<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    use HasFactory;

    public $table = "maestros";
    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'telefono',
        'direccion',
        'ciudad',
        'id_materias'
    ];
}
