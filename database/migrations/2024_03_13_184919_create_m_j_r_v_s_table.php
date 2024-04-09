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
        // Por obvias razones, tocó poner estas columnas en español. 😴
        Schema::create('m_j_r_v_s', function (Blueprint $table) {
            $table->id();
            $table->boolean('asistencia')->default(false);
            $table->string('provincia');
            $table->string('canton');
            $table->string('parroquia');
            $table->string('zona')->nullable();
            $table->string('recinto')->nullable();
            $table->string('institucion')->nullable();
            $table->string('junta', 3);
            $table->string('sexo', 1);
            $table->string('cedula', 10)->unique();
            $table->string('nombre');
            $table->string('celular', 15)->nullable();
            $table->string('coordinador_cedula', 10)->nullable();
            $table->string('coordinador_nombre')->nullable();
            $table->string('coordinador_celular', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_j_r_v_s');
    }
};
