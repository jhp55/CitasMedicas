<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
     protected $table = 'pacientes';

    protected $fillable = [
        'user_id',
        'tipo_documento',
        'numero_documento',
        'telefono',
        'fecha_nacimiento',
        'genero',
        'direccion'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
