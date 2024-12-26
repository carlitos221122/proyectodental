<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;
    protected $table = 'tratamientos';
    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'duracion_horas',
        'duracion_minutos',
        'precio',
    ];

    // Si deseas agregar más configuraciones o métodos, agrégales aquí

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
    

}
