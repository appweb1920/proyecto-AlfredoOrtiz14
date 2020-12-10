@extends('layout')

@section('content')

<div class="container pt-4 pb-4 mb-4">
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
                            <a href="/agregaCarrito/{{$p->id}}" class="btn btn-primary" onclick="carrito()">Agregar a Pedido</a>
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