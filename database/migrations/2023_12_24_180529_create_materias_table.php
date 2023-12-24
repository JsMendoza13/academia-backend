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
        Schema::create('materias', function (Blueprint $table) {
            /*Instruccion para realizar borrado en cascada*/
            $table->engine = "InnoDB";
            /*Identificacion unica en la tabla*/
            $table->bigIncrements("id")->unique();
            /*Clave foranea de Estudiante -> (unsigned = para evitar datos negativos)*/
            /*$table->unsignedBigInteger('estudiante_id')->nullable()->default(0);
            Se continua agregando los campos para tabla*/
            $table->string("nombre");
            $table->text("descripcion");
            $table->integer("credito");
            $table->integer("horas");
            $table->string("areaConocimiento");
            /*Tiempo automatico por laravel, actualizar modificar*/
            $table->timestamps();
            /*FOREIGN entre tabla ESTUDIANTE con el campo estudiante_id ->onDelete (borrado en cascada)
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete("cascade");*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
