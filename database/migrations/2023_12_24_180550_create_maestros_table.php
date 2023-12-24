<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('maestros', function (Blueprint $table) {
            /*Instruccion para realizar borrado en cascada*/
            $table->engine = "InnoDB";
            /*Identificacion unica en la tabla*/
            $table->bigIncrements("id");
            /*Clave foranea de Materia -> (unsigned = para evitar datos negativos)*/
            $table->bigInteger('materia_id')->unsigned();
            /*Se continua agregando los campos para tabla*/
            $table->string("nombres");
            $table->string("apellido");
            $table->string("email");
            $table->string("telefono");
            $table->string("direccion");
            $table->string("ciudad");
            /*Tiempo automatico por laravel, actualizar modificar*/
            $table->timestamps();
            /*FOREIGN entre tabla MATERIA con el campo materia_id ->onDelete (borrado en cascada)*/
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maestros');
    }
};
