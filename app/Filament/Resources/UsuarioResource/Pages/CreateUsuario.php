<?php

namespace App\Filament\Resources\UsuarioResource\Pages;

use App\Filament\Resources\UsuarioResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateUsuario extends CreateRecord
{
    protected static string $resource = UsuarioResource::class;

    // Método público y compatible con la firma de la clase base
    public function getTitle(): Htmlable|string
    {
        return 'Nuevo Usuario'; // Cambia el texto del encabezado aquí
    }
}
