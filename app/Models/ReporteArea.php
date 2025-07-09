<?php

// app/Models/ReporteArea.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteArea extends Model
{
    use HasFactory;

    protected $table = 'reporte_area';

    protected $fillable = [
        'area_de_trabajo_id',
        'reporte_id',
    ];

    public function areaDeTrabajo()
    {
        return $this->belongsTo(AreaDeTrabajo::class, 'area_de_trabajo_id');
    }

    public function reporte()
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }
}
