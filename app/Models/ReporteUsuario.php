<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteUsuario extends Model
{
    use HasFactory;

    // Asegúrate de que la tabla esté correctamente nombrada
    protected $table = 'reporte_usuarios';

    // Los campos que pueden ser asignados masivamente
    protected $fillable = [
        'user_id',
        'reporte_id',
        'estado_asignado',
    ];

    /**
     * Relación con el modelo User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con el modelo Reporte
     */
    public function reporte()
    {
        return $this->belongsTo(Reporte::class);
    }
}
