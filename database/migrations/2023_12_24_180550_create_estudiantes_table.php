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
        Schema::create('estudiantes', function (Blueprint $table) {
            /*Instrucción para realizar borrado en cascada*/
            $table->engine = "InnoDB";
            /*Identificación única en la tabla*/
            $table->bigIncrements("id");
            /*---campos--*/
            $table->string("nombres");
            $table->string("apellidos");
            $table->string("telefono");
            $table->string("direccion");
            $table->string("ciudad");
            $table->integer("semestre");
            $table->float("nota");

            /**FOREIGN entre tabla MATERIAS con el campo id_materia  */
            $table->foreignId('id_materias')->constrained('materias')->onUpdate('cascade')->onDelete('restrict');
            /*Tiempo automatico por laravel, actualizar modificar*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
