<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoriaClinicaController extends Controller
{
 public function index()
    {
        $historias = HistoriaClinica::with('cita.paciente.user', 'cita.medico.user')->get();

        return view('historias_clinicas.index', compact('historias'));
    }

    public function create()
    {
        $citas = Cita::with('paciente.user', 'medico.user')
            ->where('estado', 'completada')
            ->doesntHave('historiaClinica')
            ->get();

        return view('historias_clinicas.create', compact('citas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cita_id' => 'required|exists:citas,id|unique:historias_clinicas,cita_id',
            'diagnostico' => 'required|string',
            'observaciones' => 'nullable|string',
            'tratamiento' => 'nullable|string'
        ]);

        HistoriaClinica::create($request->all());

        return redirect()->route('historias_clinicas.index')
            ->with('success', 'Historia clínica registrada correctamente.');
    }

    public function show(HistoriaClinica $historiaClinica)
    {
        $historiaClinica->load('cita.paciente.user', 'cita.medico.user', 'formulaMedica');

        return view('historias_clinicas.show', compact('historiaClinica'));
    }

    public function edit(HistoriaClinica $historiaClinica)
    {
        return view('historias_clinicas.edit', compact('historiaClinica'));
    }

    public function update(Request $request, HistoriaClinica $historiaClinica)
    {
        $request->validate([
            'diagnostico' => 'required|string',
            'observaciones' => 'nullable|string',
            'tratamiento' => 'nullable|string'
        ]);

        $historiaClinica->update($request->all());

        return redirect()->route('historias_clinicas.index')
            ->with('success', 'Historia clínica actualizada correctamente.');
    }

    public function destroy(HistoriaClinica $historiaClinica)
    {
        $historiaClinica->delete();

        return redirect()->route('historias_clinicas.index')
            ->with('success', 'Historia clínica eliminada correctamente.');
    }
}
