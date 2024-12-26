<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'paciente_id',
        'tratamiento_id',
        'estado',
        'asistio', 
        'Atendido',// Nuevo campo
    ];

    protected $dates = [
        'fecha',
    ];

    // Convierte el campo hora a un objeto Carbon
    public function getHoraAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('H:i') : null;
    }

    // Convierte el campo fecha a un objeto Carbon
    public function getFechaAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function getFechaHoraAttribute()
    {
        return $this->fecha->format('Y-m-d') . ' ' . $this->hora->format('H:i');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function tratamiento()
    {
        return $this->belongsTo(Tratamiento::class);
    }

    public function hora()
    {
        return $this->belongsTo(Hora::class);
    }
    
    

}
