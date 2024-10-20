<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'cargo',
        'titulo',
        'fecha_ingreso'
    ];

    protected $table = 'candidatos';
}
