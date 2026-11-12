<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Medico;

class HorarioController extends Controller
{
     public function index()
    {
        $horarios = Horario::with('medico.user')->get();

        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        $medicos = Medico::with('user')->get();

        return view('horarios.create', compact('medicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'dia_semana' => 'required|integer|min:0|max:6',
            'hora_inicio' => 'required',
            'hora_fin' => 'required|after:hora_inicio',
            'disponible' => 'required|boolean'
        ]);

        Horario::create($request->all());

        return redirect()->route('horarios.index')
            ->with('success', 'Horario registrado correctamente.');
    }

    public function show(Horario $horario)
    {
        $horario->load('medico.user', 'citas');

        return view('horarios.show', compact('horario'));
    }

    public function edit(Horario $horario)
    {
        $medicos = Medico::with('user')->get();

        return view('horarios.edit', compact('horario', 'medicos'));
    }

    public function update(Request $request, Horario $horario)
    {
        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'dia_semana' => 'required|integer|min:0|max:6',
            'hora_inicio' => 'required',
            'hora_fin' => 'required|after:hora_inicio',
            'disponible' => 'required|boolean'
        ]);

        $horario->update($request->all());

        return redirect()->route('horarios.index')
            ->with('success', 'Horario actualizado correctamente.');
    }

    public function destroy(Horario $horario)
    {
        $horario->delete();

        return redirect()->route('horarios.index')
            ->with('success', 'Horario eliminado correctamente.');
    }
}
