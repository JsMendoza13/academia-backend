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
        Schema::create('maestro_materia', function (Blueprint $table) {
            $table->id();
            /*Clave foranea de Materia -> (->nullable()->default) Si existe un ID sin información se le asigna uno por default)*/
            $table->unsignedBigInteger('materia_id')->nullable()->default(0);
            /**FOREIGN entre tabla MATERIA con el campo materia_id ->onDelete (borrado en cascada) */
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
            /*Clave foranea de Maestro -> (->nullable()->default) Si existe un ID sin informacion se le asigna uno por default)*/
            $table->unsignedBigInteger('maestro_id')->nullable()->default(0);
            /**FOREIGN entre tabla MAESTRO con el campo maestro_id ->onDelete (borrado en cascada) */
            $table->foreign('maestro_id')->references('id')->on('maestros')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maestro_materia');
    }
};
