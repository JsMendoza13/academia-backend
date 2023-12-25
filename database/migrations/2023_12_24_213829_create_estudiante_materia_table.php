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
        Schema::create('estudiante_materia', function (Blueprint $table) {
            $table->id();
            /*Clave foranea de Materia -> (->nullable()->default) Si existe un ID sin informacion se le asigna uno por default)*/
            $table->unsignedBigInteger('materia_id')->nullable()->default(0);
            /**FOREIGN entre tabla MATERIA con el campo materia_id ->onDelete (borrado en cascada) */
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
            /*Clave foranea de Estudiante -> (->nullable()->default) Si existe un ID sin informacion se le asigna uno por default)*/
            $table->unsignedBigInteger('estudiante_id')->nullable()->default(0);
            /**FOREIGN entre tabla ESTUDIANTE con el campo estudiante_id ->onDelete (borrado en cascada) */
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiante_materia');
    }
};
