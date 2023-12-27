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
            /*Instrucción para realizar borrado en cascada*/
            $table->engine = "InnoDB";
            /*Identificación única en la tabla*/
            $table->bigIncrements("id");
            /*---campos--*/
            $table->string("nombre");
            $table->text("descripcion");
            $table->integer("credito");
            $table->integer("horas");
            $table->string("areaConocimiento");
            $table->string("electiva");
            /*Tiempo automatico por laravel, actualizar modificar*/
            $table->timestamps();
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
