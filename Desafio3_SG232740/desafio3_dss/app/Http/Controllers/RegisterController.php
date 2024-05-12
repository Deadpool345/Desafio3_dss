<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
{
    // Validar los datos de entrada
    $validatedData = $request->validate([
        'nombre' => 'required|string|unique:empleados|regex:/^[A-Za-z]+$/',
        'apellido' => 'required|string|unique:empleados|regex:/^[A-Za-z]+$/',
        'correo' => 'required|string|email|unique:empleados|regex:/^\S+@\S+\.\S+$/i',
        'contraseña' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        'cargo' => 'required|string|unique:empleados|regex:/^[A-Za-z]+$/',
        'salario' => 'required|numeric',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        'rol' => 'required|string|in:administrador,empleado',
    ], [
        'nombre.regex' => 'Solo se aceptan letras en el nombre de usuario.',
        'apellido.regex' => 'Solo se aceptan letras en el apellido de usuario.',
        'correo.email' => 'El correo electrónico debe tener un formato válido.',
        'correo.unique' => 'Este correo electrónico ya está registrado.',
        'contraseña.regex' => 'La contraseña debe tener al menos una letra minúscula, una letra mayúscula y un número.',
        'contraseña.confirmed' => 'Las contraseñas no coinciden.',
        'cargo.regex' => 'Solo se aceptan letras en el cargo.',
        'cargo.required' => 'El campo cargo es obligatorio.',
        'salario.required' => 'El campo salario es obligatorio.',
        'foto.image' => 'El archivo debe ser una imagen.',
        'foto.mimes' => 'Solo se permiten formatos de imagen: jpeg, png, jpg, gif.',
        'foto.max' => 'El tamaño máximo del archivo es 2MB.',
        'rol.in' => 'El rol seleccionado no es válido.',
        'rol.required' => 'El campo rol es obligatorio.',
    ]);

        $fotoBinaria = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoBinaria = file_get_contents($foto->getRealPath());
        }

    // Crear y almacenar el nuevo usuario (empleado)
    $empleado = new Employee();
    $empleado->nombre = $validatedData['nombre'];
    $empleado->apellido = $validatedData['apellido'];
    $empleado->correo = $validatedData['correo'];
    $empleado->contraseña = Hash::make($validatedData['contraseña']); 
    $empleado->cargo = $validatedData['cargo'];
    $empleado->salario = $validatedData['salario'];
    $empleado->foto = $fotoBinaria; 
    $empleado->role = $validatedData['rol'];
    $empleado->save();

    // Redireccionar después del registro exitoso
    return redirect('/login')->with('success', '¡Registro exitoso! Ahora puedes iniciar sesión.');
}
}
