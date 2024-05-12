<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', ['employees' => $employees]);
    }

    public function create()
    {
        return view('create_employee');
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|unique:empleados|max:255',
            'contraseña' => 'required|string|min:8',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric',
            'role' => 'required|string|in:administrador,empleado',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Guarda la foto en el almacenamiento
        $fotoBinaria = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoBinaria = file_get_contents($foto->getRealPath());
        }


        // Crea un nuevo empleado con los datos del formulario
        $empleado = new Employee();
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->correo = $request->correo;
        $empleado->contraseña = Hash::make($request['contraseña']); 
        $empleado->cargo = $request->cargo;
        $empleado->salario = $request->salario;
        $empleado->foto = $fotoBinaria;
        $empleado->role = $request['role'];
        $empleado->save();

        // Redirige de vuelta a la página de inicio del panel de administrador
        return redirect('/panel')->with('success', 'Empleado creado exitosamente.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', ['employee' => $employee]);
    }

    public function edit($id)
    {
        $empleado = Employee::findOrFail($id);
        return view('edit_employee', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric',
            'password' => 'nullable|string|min:8',
        ]);

        $empleado = Employee::findOrFail($id);
        $empleado->update([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'correo' => $request->input('correo'),
            'cargo' => $request->input('cargo'),
            'salario' => $request->input('salario'),
            'password' => $request->input('password') ? bcrypt($request->input('password')) : $empleado->password,
        ]);

        return redirect('/panel')->with('success', 'Empleado actualizado exitosamente.');
    }

    public function confirmDelete(Employee $empleado)
    {
        return view('delete_employee', compact('empleado'));
    }

    public function destroy(Employee $empleado)
    {
        $empleado->delete();
        return redirect('/panel')->with('success', 'El empleado ha sido eliminado exitosamente.');
    }
}
