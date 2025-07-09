<?php

namespace App\Http\Controllers;

use App\Models\User;    // Asegúrate de que el modelo User está importado
use App\Models\Reporte;  // Asegúrate de importar correctamente el modelo Reporte
use App\Models\ReporteUsuario;  // Importa el modelo ReporteUsuario
use Illuminate\Http\Request;

class ReporteUsuarioController extends Controller
{
    public function create()
    {
        // Obtener todos los usuarios y reportes
        $users = User::all();
        $reportes = Reporte::all();

        // Pasar las variables a la vista
        return view('reporte_usuario.create', compact('users', 'reportes'));
    }

    // Método para manejar la asignación de reporte a un usuario
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'reporte_id' => 'required|exists:reportes,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Crear la asignación
        ReporteUsuario::create([
            'user_id' => $request->user_id,
            'reporte_id' => $request->reporte_id,
            'estado_asignado' => 'pendiente',  // Estado por defecto
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('asignar.reporte')->with('success', 'Reporte asignado correctamente');
    }

 // En el controlador ReporteUsuarioController
public function index()
{
    // Obtener todos los reportes asignados a los usuarios, con sus relaciones
    $reportesAsignados = ReporteUsuario::with(['user', 'reporte'])->get();
    
    // Pasamos el listado a la vista
    return view('lista_reportes.index', compact('reportesAsignados'));
}

    
}
