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
        //dd($p);
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

    public function verOficina()
    {
        $p = producto::where('departamento', '=', 'oficina')->get();
        //dd($p);
        return view('oficina')->with('productos', $p);
    }

    public function verHogar()
    {
        $p = producto::where('departamento', '=', 'hogar')->get();
        //dd($p);
        return view('hogar')->with('productos', $p);
    }

    public function verCocina()
    {
        $p = producto::where('departamento', '=', 'cocina')->get();
        //dd($p);
        return view('cocina')->with('productos', $p);
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
            $this->validate($request, [
                'nombre' => 'required',
                'descripcion' => 'required',
                'precio' => 'required',
                'existencias' => 'required',
                'departamento' => 'required',

            ]);
            $producto = new producto;
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->foto = "";
            $producto->precio = $request->precio;
            $producto->existencias = $request->existencias;
            $producto->departamento = $request->departamento;
            //dd($producto->foto);
            $producto->save();

            $archivo = $request->file('foto');
            //dd($archivo);
            $path = $request->file('foto')->storeAs('public/img', $producto->id.".".$archivo->getClientOriginalExtension());
            $producto->foto = $producto->id.".".$archivo->getClientOriginalExtension();
            //dd($producto->foto);
            $producto->save();
        }
        //return redirect("/");
        return back();
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

    public function verProducto($id)
    {
        //buscar el dato
        $producto = producto::find($id);
        //pasarlo a la vista
        return view('verProducto')->with('p', $producto);
    }

    public function busca(Request $request)
    {
        //buscar el dato
        //dd($request->cosa);
        $producto = producto::where('nombre', 'like', '%' . $request->cosa . '%')->get();
        //sdd($producto);
        //pasarlo a la vista
        return view('welcome')->with('productos', $producto);
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
        if(Auth::user()->rol==1)
        { 
            $producto = producto::find($request->id);
            if(!is_null($producto))
            {
                $producto->nombre = $request->nombre;
                $producto->descripcion = $request->descripcion;
                $producto->precio = $request->precio;
                $producto->existencias = $request->existencias;
                $producto->departamento = $request->departamento;
                if(!is_null($request->file('foto')))
                {
                    $archivo=$request->file('foto');
                    $path = $request->file('foto')->storeAs('public/img', $producto->id.".".$archivo->getClientOriginalExtension());
                    $producto->foto = $producto->id.".".$archivo->getClientOriginalExtension();
                    //dd($producto->foto);
                }
                $producto->save();   
            }
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
        if(Auth::user()->rol==1)
        { 
            $producto = producto::find($id);
            $producto->delete();
        }
        return redirect('/');
    }
}
