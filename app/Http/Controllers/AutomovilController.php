<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Automovil;

class AutomovilController extends Controller
{
    // 👉 Mostrar el formulario y lista de vehículos
    public function create()
    {
        $automoviles = Automovil::latest()->get(); // Traer todos los automóviles registrados
        return view('automoviles.create', compact('automoviles'));
    }

    // 👉 Guardar un nuevo automóvil en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre_propietario' => 'required|string|max:255',
            'placa' => 'required|string|max:50|unique:automoviles',
            'tipo_vehiculo' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'color' => 'nullable|string',
            'fecha_hora_llegada' => 'required|date',
        ]);

        Automovil::create([
            'nombre_propietario' => $request->nombre_propietario,
            'placa' => $request->placa,
            'tipo_vehiculo' => $request->tipo_vehiculo,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'color' => $request->color,
            'fecha_hora_llegada' => $request->fecha_hora_llegada,
        ]);

        return redirect()->route('automoviles.create')->with('success', 'Automóvil registrado exitosamente.');
    }
}
