<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Verifica el rol del usuario y redirige
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin');
            } else {
                return redirect()->route('user');
            }
        }

        return redirect()->back()->withErrors(['error' => 'Credenciales incorrectas']);
    }

    public function adminPanel()
    {
        return view('admin.dashboard'); // La vista del administrador
    }

    public function userPanel()
    {
        return view('user.dashboard'); // La vista del usuario
    }
}
