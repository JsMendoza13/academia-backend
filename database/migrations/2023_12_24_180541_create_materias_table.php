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
            $table->engine = "InnoDB";
            $table->bigIncrements("id")->unique();

            $table->bigInteger('estudiante_id')->unsigned();

            $table->string("nombre");
            $table->text("descripcion");
            $table->integer("credito");
            $table->string("areaConocimiento");
            $table->timestamps();

            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete("cascade");
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