<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('citas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('paciente_id')->constrained('pacientes')->cascadeOnDelete();
        $table->foreignId('medico_id')->constrained('medicos')->cascadeOnDelete();
        $table->foreignId('horario_id')->nullable()->constrained('horarios')->nullOnDelete();
        $table->date('fecha');
        $table->time('hora_inicio');
        $table->time('hora_fin');
        $table->text('motivo')->nullable();
        $table->enum('estado', [
            'pendiente',
            'confirmada',
            'cancelada',
            'completada'
        ])->default('pendiente');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('citas');
}
};
