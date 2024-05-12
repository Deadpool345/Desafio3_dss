<?php

namespace App\Http\Controllers;
use App\Models\Employee;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index()
    {
        // Obtener todos los empleados que no son administradores
        $empleados = Employee::where('role', 'empleado')->get();

        // Pasar los empleados a la vista
        return view('PanelAdmin', ['empleados' => $empleados]);
    }
}
