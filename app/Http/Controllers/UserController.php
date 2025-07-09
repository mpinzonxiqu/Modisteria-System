<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;  // Asegúrate de tener el modelo Role
use App\Models\Permission; // Asegúrate de tener el modelo Permission
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // Mostrar todos los usuarios
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    // Mostrar el formulario para crear un nuevo usuario
    public function create()
    {
        // Si usas roles y permisos, puedes obtenerlos aquí
        $roles = Role::all();
        //$permissions = Permission::all();
        return view('user.create', compact('roles')); // Pasar roles y permisos a la vista
    }

    // Almacenar un nuevo usuario
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'estado' => 'required|string',
            'rol' => 'required|string',  // Validar el campo rol
            'permisos' => 'nullable|string',  // Cambiar a tipo string para que sea normal
        ]);
    
        // Crear el usuario con los campos proporcionados
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'estado' => $validatedData['estado'],
            'rol' => $validatedData['rol'],  // Asignar el rol que se pasa en el formulario
            'permisos' => $validatedData['permisos'] ?? '',  // Asignar permisos como cadena vacía si no se pasa nada
        ]);

        session()->flash('success', '¡Usuario creado exitosamente!');
    
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }
    
    
    

    // Mostrar el formulario para editar un usuario
    public function edit(User $user)
    {
        $roles = Role::all();  // Obtener todos los roles
        $permissions = Permission::all();  // Obtener todos los permisos
        return view('user.edit', compact('user', 'roles', 'permissions'));
    }

    // Actualizar un usuario
    public function update(Request $request, User $user)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'rol' => 'required|exists:roles,id',  // Validar que el rol exista en la tabla roles
            'estado' => 'required|string',
            'permissions' => 'nullable|array', // Validar los permisos como un array
        ]);

        // Actualizar los datos del usuario
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password,
            'estado' => $validatedData['estado'],
        ]);

        // Asociar rol al usuario
        $user->roles()->sync([$validatedData['rol']]);  // Usamos sync() para sincronizar el rol

        // Asociar permisos al usuario si es que existen
        if (isset($validatedData['permissions'])) {
            $user->permissions()->sync($validatedData['permissions']);
        }

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    // Eliminar un usuario
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
