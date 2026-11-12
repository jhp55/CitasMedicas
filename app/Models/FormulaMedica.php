<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormulaMedica extends Model
{
    protected $table = 'formulas_medicas';

    protected $fillable = [
        'historia_clinica_id',
        'instrucciones'
    ];

    public function historiaClinica()
    {
        return $this->belongsTo(HistoriaClinica::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetalleFormulaMedica::class);
    }
}
