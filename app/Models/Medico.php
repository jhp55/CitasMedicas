<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
     protected $table = 'medicos';

    protected $fillable = [
        'user_id',
        'tipo_documento',
        'numero_documento',
        'telefono',
        'tarjeta_profesional',
        'precio_consulta'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function especialidades()
    {
        return $this->belongsToMany(
            Especialidad::class,
            'medico_especialidad'
        );
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
