<?php

namespace App\Filament\Resources\UsuarioResource\Pages;

use App\Filament\Resources\UsuarioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditUsuario extends EditRecord
{
    protected static string $resource = UsuarioResource::class;

    // Método público y compatible con la firma de la clase base
    public function getTitle(): Htmlable|string
    {
        return 'Editar Usuario'; // Cambia el texto del encabezado aquí
    }

    public function getHeaderActions(): array
    {
        return [
         //   Actions\DeleteAction::make()->label('Eliminar'), // Añadimos la acción de eliminar en el encabezado
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Aquí puedes modificar los datos antes de guardar el registro editado
        return $data;
    }
}
