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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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