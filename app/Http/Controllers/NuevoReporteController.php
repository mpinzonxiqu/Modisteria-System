<?php

// app/Http/Controllers/NuevoReporteController.php

namespace App\Http\Controllers;



use App\Models\AreaDeTrabajo;  // Asegúrate de importar el modelo AreaDeTrabajo
use App\Models\Reporte;
use Illuminate\Http\Request;

class NuevoReporteController extends Controller
{
    // Mostrar la lista de reportes
    public function lista()
    {
        $reportes = Reporte::all();  // Obtener todos los reportes

        $areas = Reporte::all();  // Obtener todas las áreas de trabajo
        return view('nueva_lista_reportes.lista', compact('reportes', 'areas'));  // Pasar los reportes y áreas a la vista
    }

    // Mostrar los detalles de un reporte seleccionado
    public function show(Request $request)
    {
        $reporte = Reporte::find($request->input('reporte_id'));

        if ($reporte) {
            // Mostrar los detalles del reporte (puedes crear una vista específica)
            return view('nueva_lista_reportes.detalle', compact('reporte'));
        } else {
            return redirect()->route('nueva_lista_reportes.lista')->with('error', 'Reporte no encontrado');
        }
    }
}




