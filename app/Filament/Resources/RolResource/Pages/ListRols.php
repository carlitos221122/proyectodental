<?php
namespace App\Filament\Resources\RolResource\Pages;

use App\Filament\Resources\RolResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRols extends ListRecords
{
    protected static string $resource = RolResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Nuevo Rol') // Cambia el texto del botón aquí
                ->icon('heroicon-o-plus'), // Opcional: Puedes añadir un ícono
        ];
    }
}
