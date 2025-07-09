<?php

namespace App\Http\Controllers;

use App\Models\AreaDeTrabajo;
use Illuminate\Http\Request;

class AreaDeTrabajoController extends Controller
{
    // Listar todas las áreas de trabajo
    public function index()
    {
        $areasDeTrabajo = AreaDeTrabajo::all(); // Obtener todas las áreas de trabajo
        return view('area-de-trabajo.index', compact('areasDeTrabajo'));
    }

    // Mostrar formulario para crear una nueva área de trabajo
    public function create()
    {
        return view('area-de-trabajo.create');
    }

    // Guardar una nueva área de trabajo
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        // Crear la nueva área de trabajo
        AreaDeTrabajo::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('area-de-trabajo.index')->with('success', 'Área de trabajo creada con éxito');
    }

    // Mostrar el formulario para editar una área de trabajo
    public function edit(AreaDeTrabajo $areaDeTrabajo)
    {
        return view('area-de-trabajo.edit', compact('areaDeTrabajo'));
    }

    // Actualizar una área de trabajo
    public function update(Request $request, AreaDeTrabajo $areaDeTrabajo)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        // Actualizar la área de trabajo
        $areaDeTrabajo->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('area-de-trabajo.index')->with('success', 'Área de trabajo actualizada con éxito');
    }

    // Eliminar una área de trabajo
    public function destroy(AreaDeTrabajo $areaDeTrabajo)
    {
        $areaDeTrabajo->delete();
        return redirect()->route('area-de-trabajo.index')->with('success', 'Área de trabajo eliminada con éxito');
    }
}
