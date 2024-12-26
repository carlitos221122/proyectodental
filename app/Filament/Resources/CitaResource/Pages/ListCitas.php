<?php
namespace App\Filament\Resources\CitaResource\Pages;

use App\Filament\Resources\CitaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Widgets\CalendarWidget;

class ListCitas extends ListRecords
{
    protected static string $resource = CitaResource::class;

    protected function getActions(): array
    {
        return [
         //   Actions\CreateAction::make()
         //       ->label('Nuevo Paciente'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
         //   CalendarWidget::class,
        ];
    }
}
