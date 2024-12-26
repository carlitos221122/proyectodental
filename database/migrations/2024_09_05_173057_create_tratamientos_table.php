<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_tratamientos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamientosTable extends Migration
{
    public function up()
    {
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->integer('duracion_horas')->default(0); // Duración en horas
            $table->integer('duracion_minutos')->default(0); // Duración en minutos
            $table->decimal('precio', 8, 2); // Ajusta la precisión y escala según sea necesario
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tratamientos');
    }
}
