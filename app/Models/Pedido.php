<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'tipo_arreglo',
        'nombre_cliente',
        'telefono',
        'direccion_entrega',
        'fecha_entrega',
        'estado'
    ];

    protected $casts = [
        'fecha_entrega' => 'date'
    ];
}

