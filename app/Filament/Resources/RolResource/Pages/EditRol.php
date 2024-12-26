<?php

namespace App\Filament\Resources\RolResource\Pages;

use App\Filament\Resources\RolResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditRol extends EditRecord
{
    protected static string $resource = RolResource::class;

    // Método público y compatible con la firma de la clase base
    public function getTitle(): Htmlable|string
    {
        return 'Editar Rol'; // Cambia el texto del encabezado aquí
    }

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make()->label('Eliminar'), // Añadimos la acción de eliminar en el encabezado
        ];
    }
}
