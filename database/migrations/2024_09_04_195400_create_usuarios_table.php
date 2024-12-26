<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('ape_paterno');
            $table->string('ape_materno');
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->string('nombre_usuario')->unique();
            $table->string('contraseña');
            $table->boolean('estado')->default(true);
            $table->timestamp('fecha_registro')->useCurrent();
            //$table->foreignId('rol_id')->constrained('rols')->onDelete('cascade'); // Asegúrate de que esta línea está presente
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
