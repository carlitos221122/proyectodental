<?php

namespace App\Filament\Resources\BusquedaCitaResource\Pages;

use App\Filament\Resources\BusquedaCitaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBusquedaCita extends EditRecord
{
    protected static string $resource = BusquedaCitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
