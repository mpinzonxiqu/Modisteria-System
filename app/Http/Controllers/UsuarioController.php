<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');   
    }

    public function store(Request $request)
    {
        // Registrar los datos recibidos para depuración
        Log::info('Datos recibidos:', $request->all());

        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'contraseña' => 'required|string|min:8',
            'correo_corporativo' => 'required|email|unique:usuarios,correo_corporativo',
            'rol' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        // Registrar los datos validados para depuración
        Log::info('Datos validados:', $validatedData);

        // Crear el nuevo usuario
        Usuario::create([
            'Nombre Usuario' => $validatedData['nombre_usuario'],
            'Contraseña' => bcrypt($validatedData['contraseña']),
            'Correo_Corporativo' => $validatedData['correo_corporativo'],
            'Rol' => $validatedData['rol'],
            'Descripcion' => $validatedData['descripcion'],
            '_token' => $request->input('_token'),
        ]);

        // Registrar la creación exitosa del usuario
        Log::info('Usuario creado exitosamente.');

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Usuario creado exitosamente.');
    }
     
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    { 
        return view('usuarios.edit', compact('usuario'));
    }
   
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'contraseña' => 'required|string|min:8',
            'correo_corporativo' => 'required|email|unique:usuarios,correo_corporativo,'.$usuario->id,
            'rol' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $usuario->update([
            'Nombre Usuario' => $request->input('nombre_usuario'),
            'Contraseña' => bcrypt($request->input('contraseña')),
            'Correo_Corporativo' => $request->input('correo_corporativo'),
            'Rol' => $request->input('rol'),
            'Descripcion' => $request->input('descripcion'),
            '_token' => $request->input('_token'),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}