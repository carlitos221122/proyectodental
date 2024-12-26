<?php

namespace App\Filament\Resources\TratamientoResource\Pages;

use App\Filament\Resources\TratamientoResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditTratamiento extends EditRecord
{
    protected static string $resource = TratamientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->label('Eliminar'), // Añadimos la acción de eliminar en el encabezado
        ];
    }}