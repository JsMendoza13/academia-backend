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
            /*Instrucción para realizar borrado en cascada*/
            $table->engine = "InnoDB";
            /*Identificación única en la tabla */
            $table->bigIncrements("id");
            /*---campos--*/
            $table->string("nombres");
            $table->string("apellidos");
            $table->string("email");
            $table->string("telefono");
            $table->string("direccion");
            $table->string("ciudad");
            /*Tiempo automático por laravel, actualizar, modificar*/
            $table->timestamps();
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
