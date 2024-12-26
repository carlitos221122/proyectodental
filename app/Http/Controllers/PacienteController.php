<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:50',
            'ape_paterno' => 'required|string|max:50',
            'ape_materno' => 'required|string|max:50',
            'edad' => 'required|integer',
            'fecha_nacimiento' => 'required|date',
            'numero_telefono' => 'required|string',
            'colonia' => 'required|string',
        ]);

        Paciente::create($request->all());

        return redirect()->route('pacientes.index')->with('success', 'Paciente guardado exitosamente.');
    }

    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'nombres' => 'required|string|max:50',
            'ape_paterno' => 'required|string|max:50',
            'ape_materno' => 'required|string|max:50',
            'edad' => 'required|integer',
            'fecha_nacimiento' => 'required|date',
            'numero_telefono' => 'required|string',
            'colonia' => 'required|string',
        ]);

        $paciente->update($request->all());

        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado exitosamente.');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado exitosamente.');
    }
}
