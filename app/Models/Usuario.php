<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'ape_paterno',
        'ape_materno',
        'fecha_nacimiento',
        'edad',
        'nombre_usuario',
        'contraseña',
        'rol_id',
        'estado',
        'fecha_registro',
    ];

    // Relación con la tabla roles
    // public function rol()
    // {
    //     return $this->belongsTo(Rol::class, 'rol_id');
    // }

    // Calcula la edad basado en la fecha de nacimiento
    public function setFechaNacimientoAttribute($value)
    {
        $this->attributes['fecha_nacimiento'] = $value;
        $this->attributes['edad'] = Carbon::parse($value)->age;
    }
}
