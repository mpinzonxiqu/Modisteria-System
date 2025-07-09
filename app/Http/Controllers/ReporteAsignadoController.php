<?php

// app/Http/Controllers/ReporteAsignadoController.php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Support\Facades\Auth;

class ReporteAsignadoController extends Controller
{
    // Mostrar los reportes asignados al usuario
    public function index()
    {
        // Obtener los reportes asignados al usuario logueado
        $reportes = Auth::user()->reportes;

        // Retornar la vista con los reportes asignados
        return view('reportes.asignados', compact('reportes'));
    }
}
