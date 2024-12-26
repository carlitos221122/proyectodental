<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Paciente extends Model
{
    use HasFactory;

    protected $table = "pacientes";

    protected $fillable = [
        'nombres',
        'ape_paterno',
        'ape_materno',
        'fecha_nacimiento',
        'numero_telefono',
        'colonia',
        'foto_perfil',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    // Calcula la edad dinámicamente según la fecha de nacimiento
    public function getEdadAttribute()
    {
        return $this->fecha_nacimiento
            ? Carbon::parse($this->fecha_nacimiento)->age
            : null;
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
