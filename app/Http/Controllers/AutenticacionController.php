<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AutenticacionController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // La autenticación fue exitosa
            $user = Auth::user();
            if ($user->tipo === 'Profesor') {
                return redirect()->route('profesor.dashboard');
            } elseif ($user->tipo === 'Administrador') {
                return redirect()->route('administrador.dashboard');
            }
        }

        return redirect()->route('login')->withErrors(['error' => 'Credenciales incorrectas']);
    }

    public function logout()
    {
        Auth::logout(); // Cerrar sesión
        return redirect()->route('login'); // Redirige a la página de inicio de sesión
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Crear un nuevo usuario
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Autenticar al usuario después del registro (opcional)
        auth()->attempt($request->only('email', 'password'));

        // Redireccionar a la página de inicio o a donde desees después del registro
        return redirect('/home'); // Cambia '/home' a la URL a la que deseas redirigir

        // Puedes personalizar la lógica de redirección según tus necesidades
    }
}
