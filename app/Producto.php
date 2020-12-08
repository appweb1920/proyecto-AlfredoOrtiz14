<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    protected $table='productos';
    protected $fillable=['id','nombre','descripcion','foto','costo','existencias','departamento'];

    public function getProductosCarrito($id_cliente)
    {
        $productos = DB::select('SELECT productos.nombre, productos.foto, carrito.id, carrito.cantidad FROM productos INNER JOIN carrito ON productos.id = carrito.id_producto 
        AND carrito.id_cliente = '. $id_cliente);
        return $productos;
    }
}