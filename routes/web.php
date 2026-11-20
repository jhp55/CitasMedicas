<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\HistoriaClinicaController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\FormulaMedicaController;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\HistoriaClinica;
use App\Models\Medicamento;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $role = auth()->user()->role ?? null;

    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'medico' => redirect()->route('medico.dashboard'),
        'paciente' => redirect()->route('paciente.dashboard'),
        default => view('dashboard'),
    };
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de Administrador
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Rutas de Médico
    Route::prefix('medico')->name('medico.')->group(function () {
        Route::get('/dashboard', function () {
            return view('medico.dashboard');
        })->name('dashboard');

        Route::get('/agenda', function () {
            $citas = Cita::with('paciente.user', 'medico.user')->get();
            return view('medico.agenda', compact('citas'));
        })->name('agenda');

        Route::get('/consulta', function () {
            return view('medico.consulta');
        })->name('consulta');

        Route::get('/pacientes', function () {
            $pacientes = Paciente::with('user')->get();
            return view('medico.pacientes', compact('pacientes'));
        })->name('pacientes');
    });

    // Rutas de Paciente
    Route::prefix('paciente')->name('paciente.')->group(function () {
        Route::get('/dashboard', function () {
            return view('paciente.dashboard');
        })->name('dashboard');

        Route::get('/agendar', function () {
            $pacientes = Paciente::with('user')->get();
            $medicos = \App\Models\Medico::with('user')->get();
            return view('paciente.agendar', compact('pacientes', 'medicos'));
        })->name('agendar');

        Route::get('/citas', function () {
            $citas = Cita::with('paciente.user', 'medico.user')->get();
            return view('paciente.citas', compact('citas'));
        })->name('citas');

        Route::get('/historial', function () {
            $historias = HistoriaClinica::with('medico.user')->get();
            return view('paciente.historial', compact('historias'));
        })->name('historial');

        Route::get('/medicamentos', function () {
            $medicamentos = Medicamento::all();
            return view('paciente.medicamentos', compact('medicamentos'));
        })->name('medicamentos');

        Route::get('/perfil', function () {
            return view('paciente.perfil');
        })->name('perfil');
    });
});

require __DIR__.'/auth.php';

Route::resource('pacientes', PacienteController::class);
Route::resource('medicos', MedicoController::class);
Route::resource('especialidades', EspecialidadController::class);
Route::resource('citas', CitaController::class);
Route::resource('horarios', HorarioController::class);
Route::resource('historias-clinicas', HistoriaClinicaController::class);
Route::resource('medicamentos', MedicamentoController::class);
Route::resource('formulas-medicas', FormulaMedicaController::class);