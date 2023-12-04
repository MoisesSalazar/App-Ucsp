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
        Schema::create('curso_periodos', function (Blueprint $table) {
            $table->id();
            $table->string('periodo')->nullable();
            $table->unsignedBigInteger('curso_id'); // Cambié 'id_curso' a 'curso_id'
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso_periodos');
    }
};
