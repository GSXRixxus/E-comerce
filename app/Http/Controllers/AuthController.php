<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Muestra el formulario de login
    public function showLogin()
    {
        return view('login');
    }

    // Procesa el login (cambia el nombre del método para coincidir con la ruta)
    public function handleLogin(Request $request)
    {
        $credentials = $request->validate([
            'user' => 'required|string',
            'pass' => 'required|string|min:4'
        ]);

        // Autenticación simple
        if ($credentials['user'] === 'admin' && $credentials['pass'] === '1234') {
            $request->session()->put('usuario', $credentials['user']);
            return redirect()->route('home')->with('success', 'Bienvenido!');
        }

        return back()->withErrors([
            'login' => 'Usuario o contraseña incorrectos'
        ]);
    }


    // Cierra la sesión
    public function logout(Request $request)
    {
        $request->session()->forget('usuario');
        return redirect()->route('login')->with('status', 'Sesión cerrada correctamente');
    }
}