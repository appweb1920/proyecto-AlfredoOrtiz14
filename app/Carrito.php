<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Carrito extends Model
{
    protected $table="carrito";
    protected $fillable = ['id_cliente', 'id_producto', 'cantidad'];
}
