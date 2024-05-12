<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\EmployeeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});


    
Route::get('/register', function () {
    return view('register');
});

Route::get('/panel', function () {
    return view('PanelAdmin');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

    
Route::get('/panel', [AdminPanelController::class, 'index']);

//Autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas de registro
Route::get('/registro', [App\Http\Controllers\RegisterController::class, 'showRegistrationForm'])->name('registro.form');
Route::post('/registro', [App\Http\Controllers\RegisterController::class, 'register'])->name('registro');

//rutas para el admin
Route::get('/create_employee', [EmployeeController::class, 'create'])->name('empleados.create');
Route::post('/store_employee', [EmployeeController::class, 'store'])->name('empleados.store');

Route::get('/empleados/{id}/edit', [EmployeeController::class, 'edit'])->name('empleados.edit');
Route::put('/empleados/{id}', [EmployeeController::class, 'update'])->name('empleados.update');

// Rutas para eliminar empleado
Route::get('/empleados/{empleado}/eliminar', [EmployeeController::class, 'confirmDelete'])->name('empleados.confirmDelete');
Route::delete('/empleados/{empleado}', [EmployeeController::class, 'destroy'])->name('empleados.destroy');


