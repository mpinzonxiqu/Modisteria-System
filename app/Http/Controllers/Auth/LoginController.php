<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesar el login
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->only('email', 'password');
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Verificar el rol del usuario
            if ($user->rol == 'administrador') {
                // Redirigir a la vista de administrador
                return redirect()->route('admin.dashboard');
            } elseif ($user->rol == 'usuario') {
                // Redirigir a la vista de usuario
                return redirect()->route('user.dashboard');
            }
        }

        // Si las credenciales son incorrectas
        return redirect()->back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
    }

    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
