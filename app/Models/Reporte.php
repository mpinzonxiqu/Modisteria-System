<?php

// Modelo Reporte
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $fillable = ['NombreReporte', 'URL', 'Descripcion', 'Estado'];

    // Relación con los usuarios
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'reporte_usuarios', 'reporte_id', 'user_id')
                    ->withPivot('estado_asignado')
                    ->withTimestamps();
    }
}
