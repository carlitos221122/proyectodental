<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CitaController;

Route::get('/', function () {
    return redirect()->route('pacientes.index');
});

Route::resource('pacientes', PacienteController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('citas', CitaController::class);
Route::get('citas/events', [CitaController::class, 'getCitas']);
