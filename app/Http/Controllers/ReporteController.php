<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use Illuminate\Support\Facades\Crypt; // Importar el Crypt

class ReporteController extends Controller
{
    // Método para mostrar el formulario de creación
    public function create()
    {
        return view('reportes.create');
    }

    // Método para almacenar un nuevo reporte
    public function store(Request $request)
    {
        // Validamos los datos recibidos
        $request->validate([
            'NombreReporte' => 'required|string|max:255',
            'URL' => 'required|url',  // Validamos que la URL sea válida
            'Descripcion' => 'required|string',
        ]);

        // Encriptamos la URL antes de guardarla
        $encryptedURL = Crypt::encryptString($request->URL);

        // Creamos el reporte en la base de datos
        $reporte = new Reporte();
        $reporte->NombreReporte = $request->NombreReporte;
        $reporte->URL = $encryptedURL;  // Guardamos la URL encriptada
        $reporte->Descripcion = $request->Descripcion;
        $reporte->Estado = $request->Estado ?? 'activo';
        $reporte->save();

        // Redirigimos con un mensaje de éxito
        return redirect()->route('reportes.index')->with('success', 'Reporte creado exitosamente.');
    }
}
