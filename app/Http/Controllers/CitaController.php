<?php
namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        return view('citas.index', [
            'pacientes' => \App\Models\Paciente::all(),
            'tratamientos' => \App\Models\Tratamiento::all(),
        ]);
    }

    public function store(Request $request)
    {
        Cita::create($request->all());
        return redirect()->route('citas.index');
    }

    public function getCitas()
    {
        $citas = Cita::all();
        return response()->json($citas);
    }
}
