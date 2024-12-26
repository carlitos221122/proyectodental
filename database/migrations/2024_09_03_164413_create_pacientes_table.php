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
    Schema::create('pacientes', function (Blueprint $table) {
        $table->id();
        $table->string('nombres', 50);
        $table->string('ape_paterno', 50);
        $table->string('ape_materno', 50);
        $table->integer('edad'); 
        $table->date('fecha_nacimiento');
        $table->string('numero_telefono'); 
        $table->string('colonia'); 
        $table->string('foto_perfil')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
