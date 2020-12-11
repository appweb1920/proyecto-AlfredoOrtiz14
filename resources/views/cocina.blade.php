@extends('layout')

@section('content')
<div class="p-4 border-bottom" style="font-size: 40px; color: #124e78; background-color:rgba(245, 245, 245, 0.5);">
    <div class="container">
        Cocina
    </div>
</div>

<div class="container pt-4">
    <div class="row pt-4">
        @if(!is_null($productos))
            @foreach($productos as $p)
            <div class="col-md-3 col-sm-6 pb-5">
                <div class="card producto" style="width: 16rem;">
                    <a href="/verProducto/{{$p->id}}">
                        <img class="card-img-top imagen border-bottom" src="{{ asset('storage/img/'.$p->foto)}}" alt="Card image cap">
                    </a>
                    <div class="pt-1 card-body" style="background-color:rgba(245, 245, 245, 0.8);">
                        <div class="card-title">{{$p->nombre}}</div>
                        <div class="row">
                            <div class="card-text col-6 precio">${{$p->precio}}</div>
                            <!--<div class="card-text col-6 prodDep text-center">{{$p->departamento}}</div>-->
                        </div>
                        @guest
                        @else
                            <div class="row border-top">
                            @if(Auth::user()->rol == 1)
                                <div class="col pt-3">
                                    <a href="/actualizaProducto/{{$p->id}}"  class="btn btn-warning">Editar</a>
                                </div>
                                <div class="col pt-3">
                                    <a href="/eliminaProducto/{{$p->id}}" class="btn btn-danger pt-1" onclick="alerta()">Eliminar</a>
                                </div>
                            @elseif(Auth::user()->rol == null)
                                <div class="col pt-3 align-items-center">
                                    <a href="/agregaCarrito/{{$p->id}}" class="btn btn-primary" onclick="carrito()">Agregar
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                        <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
                                    </svg>
                                    </a>
                                </div>
                            @endif
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection

<script>
function alerta(){
    alert("El producto ha sido eliminado");
    }

function carrito(){
    alert("El producto ha sido agregado a tu carrito");
}
</script>