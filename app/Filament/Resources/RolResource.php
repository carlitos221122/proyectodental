<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RolResource\Pages;
use App\Models\Rol;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\ViewAction;

class RolResource extends Resource
{
    protected static ?string $model = Rol::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detalles del Rol')
                    ->description('Ingresa los detalles del rol')
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(255)
                            ->rule('regex:/^[\pL\s]+$/u'), // Permite letras y espacios
                        
                        Forms\Components\Textarea::make('descripcion')
                            ->label('Descripción')
                            ->nullable()
                            ->maxLength(65535), // Ajusta el límite de caracteres según tus necesidades
                    ])
                    ->columns(1), // Ajusta el número de columnas si es necesario
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable()  // Hacemos que esta columna sea buscable
                    ->description(function (Rol $rol) {
                        return $rol->descripcion;
                    }),

                //Tables\Columns\TextColumn::make('descripcion')
                  //  ->label('Descripción')
                   // ->searchable(),  // Hacemos que esta columna sea buscable
            ])
            ->paginated(false)
            ->filters([
                // Filtros si es necesario
            ])
            
            ->actions([
                Tables\Actions\EditAction::make()->label('Editar'),
               
                Tables\Actions\DeleteAction::make()->label('Eliminar'), // Botón de eliminar junto al de editar
                ViewAction::make()
                    ->label('') // Oculta el texto del botón
                    ->visible(fn ($record) => true) // Mantiene el botón activo
                    ->extraAttributes(['style' => 'visibility: hidden;']), // Estilo CSS para hacer el botón invisible
               
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
            'index' => Pages\ListRols::route('/'),
            //'create' => Pages\CreateRol::route('/create'),
          //  'edit' => Pages\EditRol::route('/{record}/edit'),
        ];
    }
}
