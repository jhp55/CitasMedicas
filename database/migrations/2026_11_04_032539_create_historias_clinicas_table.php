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
    Schema::create('historias_clinicas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('cita_id')->unique()->constrained('citas')->cascadeOnDelete();
        $table->text('diagnostico');
        $table->text('observaciones')->nullable();
        $table->text('tratamiento')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('historias_clinicas');
}
};
