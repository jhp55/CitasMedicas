<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulaMedicaController extends Controller
{
     public function index()
    {
        $formulas = FormulaMedica::with(
            'historiaClinica.cita.paciente.user',
            'detalles.medicamento'
        )->get();

        return view('formulas_medicas.index', compact('formulas'));
    }

    public function create()
    {
        $historias = HistoriaClinica::all();
        $medicamentos = Medicamento::all();

        return view('formulas_medicas.create', compact('historias', 'medicamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'historia_clinica_id' => 'required|exists:historias_clinicas,id|unique:formulas_medicas,historia_clinica_id',
            'instrucciones' => 'nullable|string'
        ]);

        FormulaMedica::create($request->all());

        return redirect()->route('formulas_medicas.index')
            ->with('success', 'Fórmula médica registrada correctamente.');
    }

    public function show(FormulaMedica $formulaMedica)
    {
        $formulaMedica->load('historiaClinica', 'detalles.medicamento');

        return view('formulas_medicas.show', compact('formulaMedica'));
    }

    public function edit(FormulaMedica $formulaMedica)
    {
        $historias = HistoriaClinica::all();

        return view('formulas_medicas.edit', compact('formulaMedica', 'historias'));
    }

    public function update(Request $request, FormulaMedica $formulaMedica)
    {
        $request->validate([
            'instrucciones' => 'nullable|string'
        ]);

        $formulaMedica->update($request->only('instrucciones'));

        return redirect()->route('formulas_medicas.index')
            ->with('success', 'Fórmula médica actualizada correctamente.');
    }

    public function destroy(FormulaMedica $formulaMedica)
    {
        $formulaMedica->delete();

        return redirect()->route('formulas_medicas.index')
            ->with('success', 'Fórmula médica eliminada correctamente.');
    }
}
