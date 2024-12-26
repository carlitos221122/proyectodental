<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {

        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
        
    }

    public function create()
    {
        return view('usuarios.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:50',
            'ape_paterno' => 'required|string|max:50',
            'ape_materno' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|date',
            'edad' => 'required|integer',
            'nombre_usuario' => 'required|string|max:50|unique:usuarios,nombre_usuario',
            'contraseña' => 'required|string|min:8',
            'estado' => 'required|boolean',
            'fecha_registro' => 'required|date',
            'rol_id' => 'required|exists:rols,id', // Validar que el rol existe
        ]);
    
        Usuario::create($request->all());
    
        return redirect()->route('usuarios.index')->with('success', 'Usuario guardado exitosamente.');
    }
    
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombres' => 'required|string|max:50',
            'ape_paterno' => 'required|string|max:50',
            'ape_materno' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|date',
            'edad' => 'required|integer',
            'nombre_usuario' => 'required|string|max:50|unique:usuarios,nombre_usuario,' . $usuario->id,
            'contraseña' => 'required|string|min:8',
            'estado' => 'required|boolean',
            'fecha_registro' => 'required|date',
            'rol_id' => 'required|exists:rols,id', // Validar que el rol existe
        ]);
    
        $usuario->update($request->all());
    
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }
}