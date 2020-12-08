<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table="detalle_pedido";
    protected $fillable = ['id_pedido', 'id_producto', 'cantidad', 'subtotal'];
}
