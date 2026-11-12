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
    Schema::create('detalle_formula_medica', function (Blueprint $table) {
        $table->id();
        $table->foreignId('formula_medica_id')->constrained('formulas_medicas')->cascadeOnDelete();
        $table->foreignId('medicamento_id')->constrained('medicamentos');
        $table->string('dosis');
        $table->string('frecuencia');
        $table->string('duracion');
        $table->unsignedInteger('cantidad');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('detalle_formula_medica');
}
};
