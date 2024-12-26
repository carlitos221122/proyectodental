<?php

namespace App\Filament\Resources\TratamientoResource\Pages;

use App\Filament\Resources\TratamientoResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateTratamiento extends CreateRecord
{
    protected static string $resource = TratamientoResource::class;

    // Método público y compatible con la firma de la clase base
    public function getTitle(): Htmlable|string
    {
        return 'Nuevo Tratamiento'; // Cambia el texto del encabezado aquí
    }
}
