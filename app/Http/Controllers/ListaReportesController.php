<?php

namespace App\Http\Controllers;

use App\Models\Reporte;

class ListaReportesController extends Controller
{
    // Método para mostrar la lista de reportes
    public function index()
    {
        // Recuperamos todos los reportes de la base de datos
        $reportes = Reporte::all();

        // Pasamos los reportes a la vista
        return view('reportes.lista', compact('reportes'));
    }
}
