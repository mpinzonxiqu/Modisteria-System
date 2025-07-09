<?php

namespace App\Http\Controllers;

use App\Models\Reporte; // Asegúrate de que el modelo Reporte esté creado
use Illuminate\Http\Request;

class MigracionController extends Controller
{
    // Muestra el formulario para registrar una nueva migración
    public function create()
    {
        return view('migraciones.create');
    }

    // Guarda la nueva migración
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'NombreReporte' => 'required|string|max:255',
            'URL' => 'required|string|max:255',
            'Descripcion' => 'required|string',
            'Estado' => 'required|string|in:activo,inactivo',
        ]);

        // Crear un nuevo registro de reporte
        $reporte = new Reporte();
        $reporte->NombreReporte = $validated['NombreReporte'];
        $reporte->URL = $validated['URL'];
        $reporte->Descripcion = $validated['Descripcion'];
        $reporte->Estado = $validated['Estado'];
        $reporte->save();

        // Redirigir a alguna página con un mensaje de éxito
        return redirect()->route('migraciones.create')->with('success', 'Migración registrada con éxito');
    }
}
