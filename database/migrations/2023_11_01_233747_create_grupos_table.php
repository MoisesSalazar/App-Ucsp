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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_periodo_id'); // Referencia a la tabla curso_periodos
            $table->unsignedBigInteger('profesor_id'); // Referencia a la tabla users
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('curso_periodo_id')->references('id')->on('curso_periodos');
            $table->foreign('profesor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
