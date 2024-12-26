<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade');
            $table->date('fecha'); // Campo para la fecha
            $table->time('hora'); // Campo para la hora
            $table->string('estado');
            $table->foreignId('tratamiento_id')->constrained('tratamientos')->onDelete('cascade');
            $table->boolean('asistio')->default(false); // Nuevo campo 'asistio'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
