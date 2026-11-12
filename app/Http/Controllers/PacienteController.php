<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller
{
     public function index()
    {
        $pacientes = Paciente::with('user')->get();

        return view('pacientes.index', compact('pacientes'));

    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'tipo_documento' => 'required',
            'numero_documento' => 'required|unique:pacientes,numero_documento',
            'telefono' => 'nullable',
            'fecha_nacimiento' => 'nullable|date',
            'genero' => 'nullable',
            'direccion' => 'nullable'
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->role = 'paciente';
            $user->save();

            Paciente::create([
                'user_id' => $user->id,
                'tipo_documento' => $request->tipo_documento,
                'numero_documento' => $request->numero_documento,
                'telefono' => $request->telefono,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'genero' => $request->genero,
                'direccion' => $request->direccion,
            ]);
        });

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente registrado correctamente.');
    }

    public function show(Paciente $paciente)
    {
        $paciente->load('user', 'citas');

        return view('pacientes.show', compact('paciente'));
    }

    public function edit(Paciente $paciente)
    {
        $paciente->load('user');

        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $paciente->user_id,
            'tipo_documento' => 'required',
            'numero_documento' => 'required|unique:pacientes,numero_documento,' . $paciente->id,
            'telefono' => 'nullable',
            'fecha_nacimiento' => 'nullable|date',
            'genero' => 'nullable',
            'direccion' => 'nullable'
        ]);

        $paciente->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $paciente->update($request->only([
            'tipo_documento', 'numero_documento', 'telefono',
            'fecha_nacimiento', 'genero', 'direccion'
        ]));

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente actualizado correctamente.');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente eliminado correctamente.');
    }
}
