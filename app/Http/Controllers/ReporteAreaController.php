
<?php


use App\Models\AreaDeTrabajo;
use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteAreaController extends Controller
{
    public function create()
{
    // Obtener todas las áreas de trabajo
    $areas = AreaDeTrabajo::all();
    // Verifica si tienes datos
    dd($areas); // Esto debería mostrar el contenido de las áreas

    // Obtener todos los reportes
    $reportes = Reporte::all();
    dd($reportes); // Esto debería mostrar el contenido de los reportes

    // Pasar las áreas y reportes a la vista
    return view('reporte_area.create', compact('areas', 'reportes'));
}

    
    
    
}
