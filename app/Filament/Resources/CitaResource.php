<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CitaResource\Pages;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Tratamiento;
use Filament\Forms; 
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Carbon\Carbon;
use Filament\Forms\Components\Modal;
use Filament\Notifications\Notification; // Asegúrate de importar el namespace
class CitaResource extends Resource
{
    protected static ?string $model = Cita::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'Citas de Hoy';
    protected static ?string $navigationGroup = 'Citas';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('fecha')
                    ->label('Fecha')
                    ->required(),

                Forms\Components\Select::make('hora')
                    ->label('Hora')
                    ->required()
                    ->options(self::getHours()),

                Forms\Components\Select::make('paciente_id')
                    ->label('Paciente')
                    ->options(Paciente::all()->pluck('nombres', 'id')->map(function($nombre, $id) {
                        return $nombre . ' ' . Paciente::find($id)->ape_paterno . ' ' . Paciente::find($id)->ape_materno;
                    }))
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

                // Cambiar Checkbox por Toggle
                Forms\Components\Toggle::make('asistio')
                    ->label('Asistió')
                    ->default(false)
                    ->hidden(fn ($context) => $context === 'edit'),

                // Agregar el campo no_asistio
                Forms\Components\Toggle::make('Atendido')
                    ->label('Atendido')
                    ->default(false)
                    ->hidden(fn ($context) => $context === 'edit'),

            ])
            ->columns(3);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(fn (Cita $query) => $query->whereDate('fecha', now()->toDateString()))
            ->columns([
                Tables\Columns\ImageColumn::make('paciente.foto_perfil')
                    ->label('Foto de Perfil')
                    ->circular()
                    ->size(50)
                    ->disk('public'),
                
                Tables\Columns\TextColumn::make('paciente.nombres')
                    ->label('Paciente')
                    ->formatStateUsing(fn ($state, $record) => $record->paciente->nombres . ' ' . $record->paciente->ape_paterno . ' ' . $record->paciente->ape_materno)
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('tratamiento.nombre')
                    ->label('Tratamiento')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('fecha')
                    ->label('Fecha')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->format('d/m/Y')),
                    
                Tables\Columns\TextColumn::make('hora')
                    ->label('Hora')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->format('H:i')),
                    
                Tables\Columns\TextColumn::make('estado')
                    ->label('Estado'),

                // Cambiar CheckboxColumn por ToggleColumn
                Tables\Columns\ToggleColumn::make('asistio')
                    ->label('Asistió')
                    ->action(fn (Cita $record) => $record->update(['asistio' => !$record->asistio])),

                // Cambiar CheckboxColumn por ToggleColumn
                Tables\Columns\ToggleColumn::make('Atendido')
                    ->label('Atendido')
                    ->action(fn (Cita $record) => $record->update(['no_asistio' => !$record->no_asistio])),
            ])
            ->paginated(false)
            ->actions([
                ViewAction::make()
                ->label('')
                ->extraAttributes(['style' => 'visibility: hidden;']),
                
                EditAction::make()->label('Editar'),
                DeleteAction::make()->label('Eliminar'),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCitas::route('/'),
        ];
    }

    protected static function getHours(): array
    {
        $allHours = collect(range(0, 23))->flatMap(function ($hour) {
            return collect(range(0, 59, 30))->map(fn ($minute) => sprintf('%02d:%02d', $hour, $minute));
        })->toArray();

        return array_combine($allHours, $allHours);
    }
}
