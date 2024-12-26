<?php

namespace App\Filament\Resources\PacienteResource\Pages;

use App\Filament\Resources\PacienteResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreatePaciente extends CreateRecord
{
    protected static string $resource = PacienteResource::class;

    // Método público y compatible con la firma de la clase base
    public function getTitle(): Htmlable|string
    {
        return 'Nuevo Paciente'; // Cambia el texto del título aquí
    }

    // Sobrescribe el método notify para evitar las notificaciones
    protected function notify(array $data): void
    {
        // No hace nada para suprimir la notificación
    }
}
