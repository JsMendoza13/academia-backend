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
            $table->engine = "InnoDB";
            $table->bigIncrements("id");

            $table->bigInteger('materia_id')->unsigned();

            $table->string("nombres");
            $table->string("apellido");
            $table->string("email");
            $table->string("telefono");
            $table->string("direccion");
            $table->string("ciudad");
            $table->timestamps();

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
