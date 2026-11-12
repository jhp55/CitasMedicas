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
    Schema::create('medico_especialidad', function (Blueprint $table) {
        $table->id();
        $table->foreignId('medico_id')->constrained('medicos')->cascadeOnDelete();
        $table->foreignId('especialidad_id')->constrained('especialidades')->cascadeOnDelete();
        $table->timestamps();

        $table->unique(['medico_id', 'especialidad_id']);
    });
}

public function down(): void
{
    Schema::dropIfExists('medico_especialidad');
}
};
