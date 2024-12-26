<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PacienteResource\Pages;
use App\Models\Paciente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\ViewAction;

class PacienteResource extends Resource
{
    protected static ?string $model = Paciente::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Informacion personal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto_perfil')
                    ->label(__('Foto de perfil'))
                    ->image()
                    ->disk('public')
                    ->directory('pacientes')
                    ->maxSize(4096)
                    ->placeholder(__('Subir imagen de perfil'))
                    ->columnSpanFull(),

                Forms\Components\Section::make('Datos personales')
                    ->description('Ingresa los datos personales')
                    ->schema([
                        Forms\Components\TextInput::make('nombres')
                            ->label('Nombres')
                            ->required()
                            ->rule('regex:/^[\pL\s]+$/u'),

                        Forms\Components\TextInput::make('ape_paterno')
                            ->label('Apellido Paterno')
                            ->required()
                            ->rule('regex:/^[\pL\s]+$/u'),

                        Forms\Components\TextInput::make('ape_materno')
                            ->label('Apellido Materno')
                            ->required()
                            ->rule('regex:/^[\pL\s]+$/u'),
                    ])->columns(3),

                Forms\Components\DatePicker::make('fecha_nacimiento')
                    ->label('Fecha de Nacimiento')
                    ->required()
                    ->reactive() // Habilita la reactividad para este campo
                    ->afterStateUpdated(function ($state, $set) {
                        if ($state) {
                            $set('edad', \Carbon\Carbon::parse($state)->age);
                        }
                    }),

                Forms\Components\TextInput::make('numero_telefono')
                    ->label('Teléfono')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('colonia')
                    ->label('Colonia')
                    ->required()
                    ->rule('regex:/^[\pL\s]+$/u'),

                Forms\Components\TextInput::make('edad')
                    ->label('Edad')
                    ->disabled() // Desactiva el campo para que no sea editable
                    ->dehydrated(false), // Evita que se guarde en la base de datos
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto_perfil')
                    ->label('Foto de Perfil')
                    ->circular()
                    ->size(50)
                    ->disk('public'),

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
                    ->label('Fecha de Nacimiento')
                    ->getStateUsing(fn ($record) => \Carbon\Carbon::parse($record->fecha_nacimiento)->format('d-m-Y')),

                Tables\Columns\TextColumn::make('numero_telefono')
                    ->label('Teléfono'),

                Tables\Columns\TextColumn::make('colonia')
                    ->label('Colonia')
                    ->searchable(),
            ])
            ->paginated(false)
            ->actions([
                ViewAction::make()->label('')
                    ->visible(fn ($record) => true)
                    ->extraAttributes(['style' => 'visibility: hidden;']),
                Tables\Actions\EditAction::make()->label('Editar'),
                Tables\Actions\DeleteAction::make()->label('Eliminar'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPacientes::route('/'),
        ];
    }
}
