<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TratamientoResource\Pages;
use App\Models\Tratamiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\ViewAction;

class TratamientoResource extends Resource
{
    protected static ?string $model = Tratamiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detalles del Tratamiento')
                    ->description('Ingresa los detalles del tratamiento')
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->label('Nombre')
                            ->required()
                            ->rule('regex:/^[\pL\s]+$/u'), // Permite letras y espacios

                        Forms\Components\Textarea::make('descripcion')
                            ->label('Descripción')
                            ->required(),

                        Forms\Components\TextInput::make('duracion_minutos')
                            ->label('Duración Estimada (Minutos)')
                            ->required()
                            ->numeric()
                            ->default(0),

                        Forms\Components\TextInput::make('precio')
                            ->label('Precio')
                            ->required()
                            ->numeric()
                            ->formatStateUsing(fn ($state) => $state !== null ? number_format($state, 2) : '0.00')
                            ->dehydrateStateUsing(fn ($state) => (float) str_replace(['$', ','], '', $state)),
                    ])
                    ->columns(3), // Ajusta el número de columnas si es necesario
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable(),

                Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->searchable(),

                Tables\Columns\TextColumn::make('duracion_minutos')
                    ->label('Duración Estimada (Minutos)')
                    ->formatStateUsing(fn ($state) => "{$state} minutos"),

                Tables\Columns\TextColumn::make('precio')
                    ->label('Precio')
                    ->formatStateUsing(fn ($state) => '$' . number_format((float) $state, 2)),
            ])
            ->paginated(false)
            ->filters([
                // Agregar filtros si es necesario
            ])
            ->actions([
                ViewAction::make()
                    ->label('') // Oculta el texto del botón
                    ->visible(fn ($record) => true) // Mantiene el botón activo
                    ->extraAttributes(['style' => 'visibility: hidden;']), // Estilo CSS para hacer el botón invisible

                Tables\Actions\EditAction::make()->label('Editar'),
                Tables\Actions\DeleteAction::make()->label('Eliminar'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Relaciones si es necesario
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTratamientos::route('/'),
            //'create' => Pages\CreateTratamiento::route('/create'),
            //'edit' => Pages\EditTratamiento::route('/{record}/edit'),
        ];
    }
}
