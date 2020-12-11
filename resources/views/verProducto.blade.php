@extends('layout')

@section('content')
<div class="container mt-4 pt-4 pb-4 mb-4">
    <div class="col-md-12 row">
        <div class="col-md-6 col-sm-12 border">
            <img src="{{ asset('storage/img/'.$p->foto)}}" class="img-fluid" alt="">
        </div>
        <div class="col-md-6 col-sm-12">
            <input type="hidden" name="id" value="{{$p->id}}">
            <div class="" style="font-size:35px;">{{$p->nombre}}</div>
            <div class="border-top pt-4" style="font-size:20px;">{{$p->descripcion}}</div>
            <div class="border-bottom precio pt-4" style="font-size:25px;">${{$p->precio}}</div>
            @guest
            @else
                @if(Auth::user()->rol == 1)
                    <div class="" style="font-size:20px;">Existencias: {{$p->existencias}}</div>
                    <div class="row">
                        <div class="col pt-3">
                            <a href="/actualizaProducto/{{$p->id}}"  class="btn btn-warning">Editar</a>
                        </div>
                        <div class="col pt-3">
                            <a href="/eliminaProducto/{{$p->id}}" class="btn btn-danger pt-1" onclick="alerta()">Eliminar</a>
                        </div>
                    </div>
                @elseif(Auth::user()->rol == null)
                    <div class="row">
                        <div class="col pt-3 align-items-center">
                            <a href="/agregaCarrito/{{$p->id}}" class="btn btn-primary" onclick="carrito()">Agregar
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
                             </svg>
                            </a>
                        </div>
                    </div>
                @endif
            @endguest
        </div>
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