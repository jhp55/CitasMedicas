<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    protected $fillable = [
        'paciente_id',
        'medico_id',
        'horario_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'motivo',
        'estado'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }

    public function historiaClinica()
    {
        return $this->hasOne(HistoriaClinica::class);
    }
}
