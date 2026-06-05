<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FuncionesCargo extends Model
{
    /** @use HasFactory<\Database\Factories\FuncionesCargoFactory> */
    use HasFactory;

    protected $fillable = [
        'id_cargo',
        'descipcion_funcion',
        'estado'
    ];
    public function cargo():BelongsTo
    {
        return $this->belongsTo(Cargo::class);
    }
}
