

<?php
// app/Http/Controllers/ReporteAreaController.php

// app/Http/Controllers/ReporteAreaController.php

use App\Http\Controllers\Controller;


use App\Models\ReporteArea;
use App\Models\AreaDeTrabajo;
use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteAreaController extends Controller
{
    // Método para mostrar el formulario de creación
    public function create()
    {
        // Obtener todas las áreas de trabajo
        $areas = AreaDeTrabajo::all();
        // Obtener todos los reportes
        $reportes = Reporte::all();
        
        // Pasar las áreas y reportes a la vista
        return view('reporte_area.create', compact('areas', 'reportes'));
    }


// Método show del controlador
public function show()
{
    // Obtener reportes y áreas de trabajo
    $reportes = Reporte::all();
    $areas = AreaDeTrabajo::all();

    // Verificar los datos
    dd($reportes, $areas);

    return view('nueva_lista_reportes.lista2', compact('reportes', 'areas'));
}






    // Otros métodos...
}




