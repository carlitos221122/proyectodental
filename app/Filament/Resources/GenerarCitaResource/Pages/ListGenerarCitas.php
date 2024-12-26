<?php

namespace App\Filament\Resources\GenerarCitaResource\Pages;

use App\Filament\Resources\GenerarCitaResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Widgets\CalendarWidget;

class ListGenerarCitas extends ListRecords
{
    protected static string $resource = GenerarCitaResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            CalendarWidget::class,
        ];
    }
}
