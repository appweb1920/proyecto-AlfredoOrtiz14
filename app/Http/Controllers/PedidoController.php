<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Carrito;
use App\DetallePedido;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->rol==null)
        { 
            $pedido = new pedido;
            $pedido->id_cliente = Auth::user()->id;
            $pedido->total = 0;

            $pedido->save();

            //Crear los detalles de pedido de cada producto.
            $carrito = new carrito;
            $total = 0;
            $prod = $carrito->getProductosCarrito(Auth::user()->id);
            foreach($prod as $p)
            {
                $detalle = new detallepedido;
                $detalle->id_pedido = $pedido->id;
                $detalle->id_producto = $p->id_producto;
                $detalle->cantidad = $p->cantidad;
                $detalle->subtotal = $p->cantidad * $p->precio;
                
                $total += $detalle->subtotal;
                $detalle->save();
            }
            //Guardar el total de la venta.
            $pedido->total = $total;
            $pedido->save();

            //Elimina el carrito
            $prodCarrito = $carrito->eliminaProdCarrito(Auth::user()->id);
            //dd($prodCarrito);
            foreach($prodCarrito as $pC)
            {
                $c = carrito::find($pC->id);
                $c->delete();
            }

        }
        return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
