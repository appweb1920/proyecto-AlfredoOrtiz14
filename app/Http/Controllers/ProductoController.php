<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p = producto::all();
        return view('welcome')->with('productos', $p);
    }

    public function nuevoProducto()
    {
        if(Auth::user()->rol==1)
        {
            return view("nuevoProducto");
        }
        else
        {
            return redirect("/");
        }
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
        if(Auth::user()->rol==1)
        { 
            //dd($request);
            $archivo = $request->file('foto');
            //dd($archivo->getClientOriginalName());
            //if($archivo->getClientOriginalExtension() == "jpeg")
            //{
            $path = $request->file('foto')->storeAs('public/img', $archivo->getClientOriginalName());

            $producto = new producto;
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->foto = $archivo->getClientOriginalName();
            $producto->precio = $request->precio;
            $producto->existencias = $request->existencias;
            $producto->departamento = $request->departamento;
            //dd($producto->foto);
            $producto->save();
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
        //buscar el dato
        $producto = producto::find($id);
        //pasarlo a la vista
        return view('actualizaProducto')->with('p', $producto);
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
        $producto = producto::find($request->id);
        if(!is_null($producto))
        {
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->precio = $request->precio;
            $producto->existencias = $request->existencias;
            $producto->save();   
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = producto::find($id);
        $producto->delete();
        return redirect('/');
    }
}
