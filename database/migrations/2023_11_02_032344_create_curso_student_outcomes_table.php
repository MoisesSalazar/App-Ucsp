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
        Schema::create('curso_student_outcomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id'); // Referencia a la tabla curso_periodos
            $table->unsignedBigInteger('student_outcome_id'); // Referencia a la tabla users
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('student_outcome_id')->references('id')->on('student_outcomes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso_student_outcomes');
    }
};
