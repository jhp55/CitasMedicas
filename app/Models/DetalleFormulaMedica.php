<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleFormulaMedica extends Model
{
    protected $table = 'detalle_formula_medica';

    protected $fillable = [
        'formula_medica_id',
        'medicamento_id',
        'dosis',
        'frecuencia',
        'duracion',
        'cantidad'
    ];

    public function formulaMedica()
    {
        return $this->belongsTo(FormulaMedica::class);
    }

    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class);
    }
}
