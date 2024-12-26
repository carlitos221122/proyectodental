<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsuarioResource\Pages;
use App\Models\Usuario;
use App\Models\Rol;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Actions\ViewAction;
use Carbon\Carbon; // Importar Carbon para calcular la edad

class UsuarioResource extends Resource
{
    protected static ?string $model = Usuario::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombres')
                    ->label('Nombres')
                    ->required()
                    ->rule('regex:/^[\pL\s]+$/u'), // Permite solo letras y espacios

                Forms\Components\TextInput::make('ape_paterno')
                    ->label('Apellido Paterno')
                    ->required()
                    ->rule('regex:/^[\pL\s]+$/u'), // Permite solo letras y espacios

                Forms\Components\TextInput::make('ape_materno')
                    ->label('Apellido Materno')
                    ->required()
                    ->rule('regex:/^[\pL\s]+$/u'), // Permite solo letras y espacios

                Forms\Components\DatePicker::make('fecha_nacimiento')
                    ->label('Fecha de Nacimiento')
                    ->required()
                    ->reactive() // Permite que reaccione a los cambios
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state) {
                            // Calcular la edad a partir de la fecha de nacimiento
                            $edad = Carbon::parse($state)->age;
                            $set('edad', $edad); // Asigna la edad calculada
                        } else {
                            $set('edad', null); // Si no hay fecha, resetea la edad
                        }
                    }),

                Forms\Components\TextInput::make('edad')
                    ->label('Edad')
                    ->required()
                    ->numeric()
                    ->disabled(), // Solo lectura, ya que se calcula automáticamente

                Forms\Components\TextInput::make('nombre_usuario')
                    ->label('Nombre de Usuario')
                    ->required(),

                Forms\Components\TextInput::make('contraseña')
                    ->label('Contraseña')
                    ->required()
                    ->password(),

                Forms\Components\Select::make('rol_id')
                    ->label('Rol')
                    ->required()
                    ->options(Rol::all()->pluck('nombre', 'id')), // Obtén los roles desde la tabla "rols"

                Forms\Components\Toggle::make('estado')
                    ->label('Estado'),

                Forms\Components\DatePicker::make('fecha_registro')
                    ->label('Fecha de Registro')
                    ->default(Carbon::now()) // Establece la fecha actual por defecto
                    ->disabled(), // Solo lectura, ya que se asigna automáticamente
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombres')
                    ->label('Nombres')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ape_paterno')
                    ->label('Apellido Paterno')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ape_materno')
                    ->label('Apellido Materno')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_nacimiento')
                    ->label('Fecha de Nacimiento'),
                Tables\Columns\TextColumn::make('edad')
                    ->label('Edad'),
                Tables\Columns\TextColumn::make('nombre_usuario')
                    ->label('Nombre de Usuario')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rol.nombre')
                    ->label('Rol'),
                Tables\Columns\TextColumn::make('estado')
                    ->label('Estado')
                    ->formatStateUsing(fn (string $state): string => $state == '1' ? 'Activo' : 'Inactivo'), // Cambia 1/0 por Activo/Inactivo
                Tables\Columns\TextColumn::make('fecha_registro')
                    ->label('Fecha de Registro'),
            ])
            ->filters([
                // Filtros si es necesario
            ])
            ->actions([
                ViewAction::make()
                    ->label('') // Oculta el texto del botón
                    ->visible(fn ($record) => true) // Mantiene el botón activo
                    ->extraAttributes(['style' => 'visibility: hidden;']), // Estilo CSS para hacer el botón invisible
                Tables\Actions\EditAction::make()->label('Editar'),
                Tables\Actions\DeleteAction::make()->label('Eliminar'), // Añadido el botón de eliminar
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
            'index' => Pages\ListUsuarios::route('/'),
            //'create' => Pages\CreateUsuario::route('/create'),
            //'edit' => Pages\EditUsuario::route('/{record}/edit'),
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Asignar fecha de registro automáticamente si no está definida
        $data['fecha_registro'] = $data['fecha_registro'] ?? Carbon::now();

        // Calcular la edad si se proporciona la fecha de nacimiento
        if (isset($data['fecha_nacimiento'])) {
            $data['edad'] = Carbon::parse($data['fecha_nacimiento'])->age;
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Asegurarse de recalcular la edad cuando se actualiza un usuario
        if (isset($data['fecha_nacimiento'])) {
            $data['edad'] = Carbon::parse($data['fecha_nacimiento'])->age;
        }

        return $data;
    }
}
