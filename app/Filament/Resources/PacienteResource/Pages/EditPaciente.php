<?php

namespace App\Filament\Resources\PacienteResource\Pages;

use App\Filament\Resources\PacienteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditPaciente extends EditRecord
{
    protected static string $resource = PacienteResource::class;

    // Método público y compatible con la firma de la clase base
    public function getTitle(): Htmlable|string
    {
        return 'Editar Paciente'; // Cambia el texto del encabezado aquí
    }

    protected function getHeaderActions(): array
    {
        return [
          //  Actions\DeleteAction::make()->label('Eliminar'), // Añadimos la acción de eliminar en el encabezado
        ];
    }
}
