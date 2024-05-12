<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'contraseña',
        'cargo',
        'salario',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contraseña',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->contraseña; 
    }

    public function isAdmin()
    {
        return $this->role === 'administrador';
    }
}
