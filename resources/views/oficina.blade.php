@extends('layout')

@section('content')
<style>
    .precio{
        font-size:18px;
        color: green;
    }
    .prodDep{
        background-color:red;
        font-size:18px;
    }
</style>
<div class="p-4 border-bottom" style="font-size: 40px; color: #124e78; background-color:rgba(245, 245, 245, 0.5);">
    <div class="container">
        Oficina
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
                    <div class="pt-1 card-body">
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
                                    <a href="/agregaCarrito/{{$p->id}}" class="btn btn-primary" onclick="carrito()">Agregar a Pedido</a>
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