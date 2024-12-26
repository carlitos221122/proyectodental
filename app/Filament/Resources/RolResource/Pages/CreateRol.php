<?php

namespace App\Filament\Resources\RolResource\Pages;

use App\Filament\Resources\RolResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateRol extends CreateRecord
{
    protected static string $resource = RolResource::class;

    // Método público y compatible con la firma de la clase base
    public function getTitle(): Htmlable|string
    {
        return 'Nuevo Rol'; // Cambia el texto del título aquí
    }
}
