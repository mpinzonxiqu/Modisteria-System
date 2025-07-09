<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reporte;
use App\Models\ReporteUsuario;
use Illuminate\Http\Request;

class ReporteAsignacionController extends Controller
{
    // Mostrar el formulario
    public function create()
    {
        $users = User::all();
        $reportes = Reporte::all();
        return view('reporte_usuario.create', compact('users', 'reportes'));
    }

    // Almacenar la asignación del reporte
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'reporte_id' => 'required|exists:reportes,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Crear la asignación
        ReporteUsuario::create([
            'user_id' => $request->user_id,
            'reporte_id' => $request->reporte_id,
            'estado_asignado' => 'pendiente',
        ]);

        // Redirigir al formulario con un mensaje de éxito
        return redirect()->route('reporte_usuario.create')->with('success', 'Reporte asignado correctamente');
    }
}
