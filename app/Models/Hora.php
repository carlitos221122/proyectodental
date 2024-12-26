<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hora extends Model
{
    use HasFactory;

    // Los campos que se pueden asignar en masa
    protected $fillable = [
        'horitas',
    ];

    // Si es necesario, puedes definir relaciones con otros modelos
    // Por ejemplo, si tienes una relación con el modelo Cita:
    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
