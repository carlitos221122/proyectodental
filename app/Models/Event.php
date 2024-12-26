<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Define los campos que pueden ser asignados en masa
    protected $fillable = [
        'title',
        'color',
        'start_at',
        'end_at',
    ];

    // Puedes agregar otras configuraciones o relaciones si es necesario
}
