<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rols'; // Asegúrate de que sea 'rols' en lugar de 'roles'

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // public function usuarios()
    // {
    //     return $this->hasMany(Usuario::class, 'rol_id');
    // }
}
