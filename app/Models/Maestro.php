<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    use HasFactory;

    public $table = "maestros";
    protected $fillable = array("*");

    public function materia()
    {
        return $this->belongsToMany(Materia::class, "maestro_materia");
    }
}
