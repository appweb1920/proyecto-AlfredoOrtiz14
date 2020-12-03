@extends('layout')

@section('content')



<div class="container pt-4">
    <div class="row pt-4">
        @if(!is_null($productos))
            @foreach($productos as $p)
            <div class="col-3">
                <div class="card producto" style="width: 16rem;">
                    <a href="/perfil">
                        <img class="card-img-top imagen border-bottom" src="{{ asset('storage/img/'.$p->foto)}}" alt="Card image cap">
                    </a>
                    <div class="pt-1 card-body">
                        <div class="card-title">{{$p->nombre}}</div>
                        <div class="card-text">${{$p->precio}}</div>
                        @guest
                        @else
                            <div class="row border-top">
                            @if(Auth::user()->rol == 1)
                                <div class="col pt-3">
                                    <a href="http://"  class="btn btn-warning">Editar</a>
                                </div>
                                <div class="col pt-3">
                                    <a href="/eliminaProducto/{{$p->id}}" class="btn btn-danger pt-1">Eliminar</a>
                                </div>
                            @elseif(Auth::user()->rol == null)
                                <div class="col pt-3 align-items-center">
                                    <a href="http://" class="btn btn-primary">Agregar a Pedido</a>
                                </div>
                            @endif
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        <!--<div class="col-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body border-top">
                    <div class="row">Producto</div>
                    <div class="row">Precio</div>
                    <div class="row">Agregar</div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body border-top">
                    <div class="row">Producto</div>
                    <div class="row">Precio</div>
                    <div class="row">Agregar</div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body border-top">
                    <div class="row">Producto</div>
                    <div class="row">Precio</div>
                    <div class="row">Agregar</div>
                </div>
            </div>
        </div>-->
    </div>
</div>
@endsection