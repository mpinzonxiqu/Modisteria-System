<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'Nombre Usuario',
        'Contraseña',
        'Correo_Corporativo',
        'Rol',
        'Descripcion',
        '_token',
        // otros campos que quieras permitir para asignación masiva
    ];
}

