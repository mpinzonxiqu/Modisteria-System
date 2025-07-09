<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $users = User::all();  // Obtener todos los usuarios
        return view('user_management.index', compact('users'));  // Vista con todos los usuarios
    }

    // Mostrar el formulario para editar un usuario
    public function edit(User $user)
    {
        $roles = Role::all();  // Obtener los roles disponibles
        return view('user_management.edit', compact('user', 'roles'));  // Vista para editar un usuario
    }

    // Actualizar un usuario
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'estado' => 'required|string',
            'rol' => 'required|string',
        ]);

        // Actualizar el usuario
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password,
            'estado' => $validatedData['estado'],
            'rol' => $validatedData['rol'],
        ]);

        return redirect()->route('user-management.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    // Eliminar un usuario
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user-management.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
