<?php

namespace App\Filament\Resources\GenerarCitaResource\Pages;

use App\Filament\Resources\GenerarCitaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGenerarCita extends EditRecord
{
    protected static string $resource = GenerarCitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
