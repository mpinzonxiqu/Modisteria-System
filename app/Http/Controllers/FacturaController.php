<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /** Listado */


public function index(Request $request)
{
    $query = Factura::query();

    // Filtro por nombre del cliente
    if ($request->filled('cliente')) {
        $query->where('nombre_cliente', 'like', '%' . $request->cliente . '%');
    }

    // Filtro por fecha de entrega exacta
    if ($request->filled('fecha_entrega')) {
        $query->whereDate('fecha_entrega', $request->fecha_entrega);
    }

    // Filtro por fecha de recibido exacta
    if ($request->filled('fecha_recibido')) {
        $query->whereDate('fecha_recibido', $request->fecha_recibido);
    }

    // Ordena por fecha de recibido, de más reciente a más antiguo
    $facturas = $query->orderBy('fecha_recibido', 'desc')->paginate(10);

    return view('facturas.index', compact('facturas'));
}


    /** Formulario de alta */
    public function create()
    {
        return view('facturas.create');
    }

    /** Guardar */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_cliente'   => 'required|string|max:255',
            'numero_contacto'  => 'required|string|max:25',
            'prenda'           => 'required|string|max:255',
            'valor_a_pagar'    => 'required|numeric|min:0',
            'fecha_recibido'   => 'required|date',
            'fecha_entrega'    => 'required|date|after_or_equal:fecha_recibido',
            'observaciones'    => 'nullable|string',
        ]);

        Factura::create($data);

        return redirect()->route('facturas.index')
                         ->with('success', 'Factura registrada correctamente');
    }

    /** Formulario de edición */
    public function edit(Factura $factura)
    {
        return view('facturas.edit', compact('factura'));
    }

    /** Actualizar */
    public function update(Request $request, Factura $factura)
    {
        $data = $request->validate([
            'nombre_cliente'   => 'required|string|max:255',
            'numero_contacto'  => 'required|string|max:25',
            'prenda'           => 'required|string|max:255',
            'valor_a_pagar'    => 'required|numeric|min:0',
            'fecha_recibido'   => 'required|date',
            'fecha_entrega'    => 'required|date|after_or_equal:fecha_recibido',
            'observaciones'    => 'nullable|string',
        ]);

        $factura->update($data);

        return redirect()->route('facturas.index')
                         ->with('success', 'Factura actualizada correctamente');
    }

    /** Eliminar (opcional) */
    public function destroy(Factura $factura)
    {
        $factura->delete();
        return back()->with('success', 'Factura eliminada');
    }
}
