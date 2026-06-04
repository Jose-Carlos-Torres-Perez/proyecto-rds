<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cargo extends Model
{
    /** @use HasFactory<\Database\Factories\CargoFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre_cargo',
        'descripcion'
    ];

    public function empleados():HasMany
    {
        return $this->hasMany(Empleado::class);
    }
    public function funcionescargos():HasMany
    {
        return $this->hasMany(FuncionesCargo::class);
    }
}
