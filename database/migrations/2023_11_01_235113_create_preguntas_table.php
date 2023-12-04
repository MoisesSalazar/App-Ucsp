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
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('examen_id'); // Referencia a la tabla curso_periodos
            $table->timestamps();
            $table->string('enunciado')->nullable();
            $table->string('photo')->nullable();
            $table->string('student_outcomes')->nullable();
            $table->integer('puntaje');
            // Definir las claves foráneas
            $table->foreign('examen_id')->references('id')->on('examens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntas');
    }
};
