<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    protected $fillable = ['monto', 'fecha_inicio', 'fecha_fin', 'departamento_id', 'inquilino_id'];
    protected $table = 'alquileres';
    // Relación con inquilinos
    public function inquilinos()
    {
        return $this->belongsToMany(Inquilino::class);
    }

    // Relación con departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
