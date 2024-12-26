<?php
namespace App\Filament\Widgets;

use App\Filament\Resources\CitaResource;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Tratamiento;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Carbon\Carbon;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Actions\CreateAction;
use Filament\Notifications\Notification;

class CalendarWidget extends FullCalendarWidget
{
    public Model|string|null $model = Cita::class;
    public string $fecha;
    public string|null $horaSeleccionada = null;
    public ?Tratamiento $tratamientoSeleccionado = null; // Cambiar a ?Tratamiento
    protected bool $shouldOpenForm = true;
    protected bool $isCreating = false;

    public string|null $siguienteHoraGuardada = null; // Nueva variable para almacenar la siguiente hora



    public function mount(): void
    {
        $this->fecha = Carbon::now()->format('Y-m-d');
    }

    public function updateFecha(string $fecha): void
    {
        $this->fecha = $fecha;
        $this->getAvailableHours();
    }

    public function fetchEvents(array $fetchInfo): array
    {
        return Cita::query()
            ->get()
            ->map(
                fn (Cita $event) => [
                    'id' => $event->id,
                    'title' => ' - '. $event->paciente->nombres . ' ' . $event->paciente->ape_paterno . ' ' . $event->paciente->ape_materno . ' - ' . $event->tratamiento->nombre,
                    'start' => Carbon::parse($event->fecha)->format('Y-m-d') . 'T' . Carbon::parse($event->hora)->format('H:i'),
                    'backgroundColor' => $this->getStatusColor($event->estado),
                ]
            )
            ->all();
    }

 // Método para calcular la siguiente hora
 protected function calcularSiguienteHora(string $horaSeleccionada): string
 {
     // Convertir la hora seleccionada a un objeto Carbon
     $hora = Carbon::createFromFormat('H:i', $horaSeleccionada);

     // Sumar 30 minutos para obtener la siguiente hora
     $siguienteHora = $hora->copy()->addMinutes(30);

     // Almacenar la siguiente hora en la variable
     $this->siguienteHoraGuardada = $siguienteHora->format('H:i');

     // Devolver la siguiente hora en formato de cadena
     return $this->siguienteHoraGuardada;
 }



    public function getFormSchema(): array
    {
        if (!$this->shouldOpenForm) {
            return [];
        }

        return [
            Forms\Components\DatePicker::make('fecha')
                ->label('Fecha')
                ->required()
                ->displayFormat('d-m-Y')
                ->reactive()
                ->afterStateUpdated(fn ($state) => $this->updateFecha($state)),

                Forms\Components\Select::make('hora')
                ->label('Hora')
                ->required()
                ->options($this->getAvailableHours())
                ->formatStateUsing(fn ($state) => $state)
                ->afterStateUpdated(function ($state) {
                    $this->horaSeleccionada = $state;
    
                    // Calcular la siguiente hora y mostrar la notificación
                    $horaSiguiente = $this->calcularSiguienteHora($state);
                    Notification::make()
                        ->title('Próxima Hora')
                        ->body('La siguiente hora es las ' . $horaSiguiente)
                        ->success()
                        ->send();
                }),
            Forms\Components\Select::make('paciente_id')
                ->label('Paciente')
                ->options(Paciente::all()->mapWithKeys(fn($paciente) => [
                    $paciente->id => $paciente->nombres . ' ' . $paciente->ape_paterno . ' ' . $paciente->ape_materno,
                ]))
                ->searchable()
                ->required(),

            Forms\Components\Select::make('tratamiento_id')
                ->label('Tratamiento')
                ->options(Tratamiento::all()->mapWithKeys(function ($tratamiento) {
                    $totalMinutes = ($tratamiento->duracion_horas * 60) + $tratamiento->duracion_minutos;
                    return [
                        $tratamiento->id => $tratamiento->nombre . " ({$totalMinutes} min)"
                    ];
                }))
                ->required()
                ->afterStateUpdated(function ($state) {
                    $this->tratamientoSeleccionado = Tratamiento::find($state); // Almacena el objeto Tratamiento

                    // Asegúrate de que el tratamiento seleccionado no sea nulo antes de mostrar la notificación
                    if ($this->tratamientoSeleccionado) {
                        Notification::make()
                            ->title('Tratamiento Seleccionado')
                            ->body('Has seleccionado el tratamiento: ' . $this->tratamientoSeleccionado->nombre)
                            ->success() // Tipo de notificación
                            ->send();
                    }
                }),

            Forms\Components\Select::make('estado')
                ->label('Estado')
                ->options([
                    'pendiente' => 'Pendiente',
                    'confirmada' => 'Confirmada',
                    'cancelada' => 'Cancelada',
                ])
                ->required(),
        ];
    }


    protected function getAvailableHours(): array
{
    $startHour = 8;
    $endHour = 19;
    $interval = 30;

    $hours = [];
    $occupiedHours = $this->getOccupiedHours();

    // Lógica para mostrar horas ocupadas solo si no se está creando una nueva cita
    if ($this->isCreating) {
        // Agregar aquí la lógica para omitir horas de tratamientos largos
        foreach ($occupiedHours as $occupiedHour) {
            $tratamiento = Cita::where('hora', $occupiedHour)->first()->tratamiento; // Obtener el tratamiento
            if ($tratamiento && ($tratamiento->duracion_horas * 60 + $tratamiento->duracion_minutos) > 44) {
                // Si la duración del tratamiento es mayor a 44 minutos, omitir esta hora y la siguiente
                $siguienteHora = Carbon::createFromFormat('H:i', $occupiedHour)->addMinutes(30)->format('H:i');
                $occupiedHours[] = $siguienteHora; // Agregar la siguiente hora a las ocupadas
            }
        }

        for ($hour = $startHour; $hour <= $endHour; $hour++) {
            for ($minute = 0; $minute < 60; $minute += $interval) {
                if ($hour == $startHour && $minute < 30) {
                    continue;
                }
                if ($hour == $endHour && $minute > 30) {
                    continue;
                }

                $formattedTime = sprintf('%02d:%02d', $hour, $minute);
                
                // Omite horas ocupadas al crear
                if (in_array($formattedTime, $occupiedHours)) {
                    continue; // Omite horas ocupadas al crear
                }

                if ($this->tratamientoSeleccionado && $this->tratamientoSeleccionado->duracion_minutos > 30) {
                    // Aquí puedes definir qué horas deseas omitir
                    if ($formattedTime === $this->siguienteHoraGuardada) {
                        continue; 
                    }
                }

                $hours[$formattedTime] = $formattedTime;
            }
        }
    } else {
        // Si no se está creando, mostrar todas las horas
        for ($hour = $startHour; $hour <= $endHour; $hour++) {
            for ($minute = 0; $minute < 60; $minute += $interval) {
                if ($hour == $startHour && $minute < 30) {
                    continue;
                }
                if ($hour == $endHour && $minute > 30) {
                    continue;
                }
                $formattedTime = sprintf('%02d:%02d', $hour, $minute);
                $hours[$formattedTime] = $formattedTime; // Agregar todas las horas
            }
        }
    }

    return $hours;
}


    // Método para obtener las horas ocupadas en una fecha determinada
    protected function getOccupiedHours(): array
    {
        return Cita::whereDate('fecha', $this->fecha)
            ->pluck('hora')
            ->toArray();
    }

    protected function getStatusColor(string $status): string
    {
        return match ($status) {
            'pendiente' => '#f59e0b',
            'confirmada' => '#10b981',
            'cancelada' => '#ef4444',
            default => '#6b7280',
        };
    }

    protected function headerActions(): array
    {
        return [
            CreateAction::make()
                ->mountUsing(
                    function (Forms\Form $form, array $arguments) {
                        $selectedDate = Carbon::parse($arguments['start'] ?? Carbon::now()->format('Y-m-d'));
                        $today = Carbon::now()->startOfDay();

                        // Verifica si la fecha seleccionada es anterior a hoy
                        if ($selectedDate < $today) {
                            Notification::make()
                                ->title('Error')
                                ->body('No puedes seleccionar una fecha anterior al día actual.')
                                ->danger()
                                ->send();

                            // Evita que el formulario se abra
                            $this->shouldOpenForm = false; // Cambiar la propiedad
                            return false;
                        }

                        // Si estás editando una cita existente
                        if (isset($arguments['eventId'])) {
                            $cita = Cita::find($arguments['eventId']);
                            $form->fill([
                                'fecha' => $cita->fecha->format('Y-m-d'),
                                'hora' => $cita->hora->format('H:i'), // Llenar la hora existente
                                'paciente_id' => $cita->paciente_id,
                                'tratamiento_id' => $cita->tratamiento_id,
                                'estado' => $cita->estado,
                            ]);
                            $this->horaSeleccionada = $cita->hora->format('H:i'); // Establecer la hora seleccionada
                        } else {
                            // Si es una nueva cita
                            $form->fill([
                                'fecha' => $selectedDate->format('Y-m-d'),
                                'hora' => null,
                                'paciente_id' => null,
                                'tratamiento_id' => null,
                                'estado' => 'pendiente', // Valor por defecto
                            ]);
                            $this->horaSeleccionada = null; // Asegúrate de que esté vacío al crear

                            // Indicar que se está creando una nueva cita
                            $this->isCreating = true;
                        }

                        // Actualiza la fecha y carga horas disponibles
                        $this->updateFecha($selectedDate->format('Y-m-d'));

                        // Redirigir al widget
                        $this->shouldOpenForm = true; // Asegurarse de que el formulario se pueda abrir
                    }
                )
        ];
    }

    // Método para manejar la cancelación de la creación de citas
    public function cancelCreation(): void
    {
        $this->isCreating = false; // Restablecer el estado de creación
        $this->horaSeleccionada = null; // Restablecer la hora seleccionada
        $this->updateFecha($this->fecha); // Mostrar todas las horas
    }
}
