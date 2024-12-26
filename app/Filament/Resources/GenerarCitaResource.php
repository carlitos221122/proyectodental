<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GenerarCitaResource\Pages;
use App\Filament\Resources\GenerarCitaResource\RelationManagers;
use App\Models\Cita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Paciente;
use App\Models\Tratamiento;

class GenerarCitaResource extends Resource
{
    protected static ?string $model = Cita::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'Generar Citas';
    protected static ?string $navigationGroup = 'Citas';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TimePicker::make('hora')
                    ->label('Hora')
                    ->required()
                    ->format('H:i'),

                Forms\Components\Select::make('paciente_id')
                    ->label('Paciente')
                    ->options(Paciente::all()->pluck('nombres', 'id'))
                    ->required(),

                Forms\Components\Select::make('tratamiento_id')
                    ->label('Tratamiento')
                    ->options(Tratamiento::all()->pluck('nombre', 'id'))
                    ->required(),

                Forms\Components\Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'confirmada' => 'Confirmada',
                        'cancelada' => 'Cancelada',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->paginated(false);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGenerarCitas::route('/'),
            'create' => Pages\CreateGenerarCita::route('/create'),
            'edit' => Pages\EditGenerarCita::route('/{record}/edit'),
        ];
    }
}
