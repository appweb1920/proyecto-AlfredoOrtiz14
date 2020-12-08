<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrito;
use App\User;
use App\Producto;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            //dd($request->id);
            $carrito = new carrito;
            $carrito->id_cliente = Auth::user()->id;
            $carrito->id_producto = $request->id;
            $carrito->cantidad = 1;
            
            $carrito->save();
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
        if(Auth::user()->rol==null)
        { 
            $carrito = new carrito;
            $total = 0;
            //$carrito = carrito::where('id_cliente', '=', $id)->get();
            $prod = $carrito->getProductosCarrito($id);
            //dd(count($prod));
            if(count($prod) == 0)
            {
                $prod = null;
            }
            else{
                foreach($prod as $p){
                    $total += ($p->precio * $p->cantidad); 
                }
                //dd($total);
            }
            return view('carrito')->with('productos', $prod)->with('total', $total);
        }
        else
            return view('/');
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

    public function actualiza(Request $request)
    {
        if(Auth::user()->rol==null)
        { 
            $carrito = carrito::find($request->id);
            if(!is_null($carrito))
            {
                $carrito->cantidad = $request->cantidad;
                $carrito->save();   
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->rol==null)
        { 
            $carrito = carrito::find($id);
            $carrito->delete();
        }
        return redirect()->back();
    }
}
