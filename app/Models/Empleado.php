<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Empleado extends Model
{
    /** @use HasFactory<\Database\Factories\EmpleadoFactory> */
    use HasFactory;

    protected $fillable = [

    'nombres',
    'apellidos',
    'fecha_nacimiento',
    'fecha_ingreso',
    'salario',
    'estado'
    ];
    public function cargos(): HasMany
    {
        return $this->hasMany(Cargo::class);
    }
}
