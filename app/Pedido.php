<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pedido extends Model
{
    protected $table="pedido";
    protected $fillable = ['id_cliente', 'total'];

    public function detallePedido($id_pedido)
    {
        $p = DB::select('SELECT productos.nombre, productos.precio, detalle_pedido.cantidad, detalle_pedido.subtotal FROM productos 
        INNER JOIN detalle_pedido ON productos.id = detalle_pedido.id_producto 
        WHERE detalle_pedido.id_pedido = '. $id_pedido);
        //dd($p);
        return $p;
    }
}

