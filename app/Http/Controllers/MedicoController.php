<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medico;
use App\Models\User;
use App\Models\Especialidad;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::with('user', 'especialidades')->get();

        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();

        return view('medicos.create', compact('especialidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'tipo_documento' => 'required',
            'numero_documento' => 'required|unique:medicos,numero_documento',
            'telefono' => 'nullable',
            'tarjeta_profesional' => 'required|unique:medicos,tarjeta_profesional',
            'precio_consulta' => 'required|numeric|min:0',
            'especialidades' => 'required|array'
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->role = 'medico';
            $user->save();

            $medico = Medico::create([
                'user_id' => $user->id,
                'tipo_documento' => $request->tipo_documento,
                'numero_documento' => $request->numero_documento,
                'telefono' => $request->telefono,
                'tarjeta_profesional' => $request->tarjeta_profesional,
                'precio_consulta' => $request->precio_consulta,
            ]);

            $medico->especialidades()->sync($request->especialidades);
        });

        return redirect()->route('medicos.index')
            ->with('success', 'Médico registrado correctamente.');
    }

    public function show(Medico $medico)
    {
        $medico->load('user', 'especialidades', 'horarios', 'citas');

        return view('medicos.show', compact('medico'));
    }

    public function edit(Medico $medico)
    {
        $medico->load('user');
        $especialidades = Especialidad::all();

        return view('medicos.edit', compact('medico', 'especialidades'));
    }

    public function update(Request $request, Medico $medico)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $medico->user_id,
            'tipo_documento' => 'required',
            'numero_documento' => 'required|unique:medicos,numero_documento,' . $medico->id,
            'telefono' => 'nullable',
            'tarjeta_profesional' => 'required|unique:medicos,tarjeta_profesional,' . $medico->id,
            'precio_consulta' => 'required|numeric|min:0',
            'especialidades' => 'required|array'
        ]);

        $medico->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $medico->update($request->only([
            'tipo_documento', 'numero_documento', 'telefono',
            'tarjeta_profesional', 'precio_consulta'
        ]));

        $medico->especialidades()->sync($request->especialidades);

        return redirect()->route('medicos.index')
            ->with('success', 'Médico actualizado correctamente.');
    }

    public function destroy(Medico $medico)
    {
        $medico->delete();

        return redirect()->route('medicos.index')
            ->with('success', 'Médico eliminado correctamente.');
    }
}
