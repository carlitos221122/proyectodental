<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Importa la clase DB

class CreateHorasTable extends Migration
{
    public function up()
    {
        Schema::create('horas', function (Blueprint $table) {
            $table->id();
            $table->time('horitas')->unique(); // Campo para la hora
            $table->timestamps();
        });

        // Insertar las horas en intervalos de 30 minutos
        $horas = [];
        for ($h = 0; $h < 24; $h++) {
            for ($m = 0; $m < 60; $m += 30) {
                $horas[] = [
                    'horitas' => sprintf('%02d:%02d:00', $h, $m), // Formato HH:MM:SS
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('horas')->insert($horas); // Utiliza DB para insertar las horas
    }

    public function down()
    {
        Schema::dropIfExists('horas');
    }
}
