<?php

namespace App\Http\Controllers;   

use App\Models\Area; // Asegúrate de tener el modelo adecuado importado
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Supongamos que 'Area' es un modelo y quieres pasar todos los registros de áreas
        $areas = Area::all(); // Esto obtendrá todas las áreas de la base de datos

        // Ahora pasamos la variable $areas a la vista
        return view('admin.dashboard', compact('areas'));
    }
}
      