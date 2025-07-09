<?php

// app/Models/AreaDeTrabajo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaDeTrabajo extends Model
{
    use HasFactory;

    protected $table = 'area_de_trabajos'; // Asegúrate de que el nombre de la tabla coincida

    protected $fillable = [
        'nombre', // Asumiendo que el área tiene un campo nombre
        'descripcion', // Agregar descripción aquí
    ];

    // Relación con ReporteArea
    public function reporteAreas()
    {
        return $this->hasMany(ReporteArea::class);
    }
}
