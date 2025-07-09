<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'facturas';

    protected $fillable = [
        'nombre_cliente',
        'numero_contacto',
        'prenda',
        'valor_a_pagar',
        'fecha_recibido',
        'fecha_entrega',
        'observaciones',
    ];

    protected $dates = ['fecha_recibido', 'fecha_entrega'];
}
