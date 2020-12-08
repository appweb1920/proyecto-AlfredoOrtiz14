<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Carrito extends Model
{
    protected $table="carrito";
    protected $fillable = ['id_cliente', 'id_producto', 'cantidad'];

    public function getProductosCarrito($id_cliente)
    {
        $p = DB::select('SELECT * FROM productos INNER JOIN carrito ON productos.id = carrito.id_producto 
        AND carrito.id_cliente = '. $id_cliente);
        return $p;
    }
}
