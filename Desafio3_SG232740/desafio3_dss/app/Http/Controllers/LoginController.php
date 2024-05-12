<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {   
        $credentials = $request->only('correo', 'password');

        if (Auth::guard('employee')->attempt($credentials)) {
            $empleado = Auth::guard('employee')->user();

            if ($empleado->isAdmin()) {
                return redirect()->intended('/panel')->with('empleado', $empleado);
            } else {
                return redirect()->intended('/dashboard');
            }
        } else {
            return back()->withErrors([
                'mensaje' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('employee')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

