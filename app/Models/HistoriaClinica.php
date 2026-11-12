<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
      protected $table = 'historias_clinicas';

    protected $fillable = [
        'cita_id',
        'diagnostico',
        'observaciones',
        'tratamiento'
    ];

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }

    public function formulaMedica()
    {
        return $this->hasOne(FormulaMedica::class);
    }
}
