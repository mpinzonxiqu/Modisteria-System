<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automovil extends Model
{
    use HasFactory;

    protected $table = 'automoviles';

    protected $fillable = [
        'nombre_propietario',
        'placa',
        'tipo_vehiculo',
        'marca',
        'modelo',
        'color',
        'fecha_hora_llegada',
    ];

    protected $casts = [
        'fecha_hora_llegada' => 'datetime',
    ];
}
