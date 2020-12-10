@extends('layout')

@section('content')
<style>
.fotoCar{
    height:100px;
    width:100px;
}
.car{
    font-size:18.5px;
}
</style>

<div class="p-4 border-bottom fondo" 
        style="font-size: 40px; color: #124e78; background-color:rgba(245, 245, 245, 0.5);">
    <div class="container">
        Mi carrito
    </div>
</div>

<div class="container p-4 car">
    @if(!is_null($productos))
        @foreach($productos as $p)
        <input type="hidden" name="id" value="{{$p->id}}">
        <form action="/actualizaCar/{{$p->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="border mt-4 row" style="background-color:rgba(245, 245, 245, 0.5);">
                <div class="pb-4 pt-4 col-md-2 col-sm-12">
                    <img class="fotoCar border" src="{{ asset('storage/img/'.$p->foto)}}" alt="">
                </div>
                <div class="pb-4 pt-4 col-md-2 col-sm-12">
                    <div class="row">{{$p->nombre}}</div>
                    <div class="row">${{$p->precio}}</div>
                </div>
                <div class="pb-4 pt-4 col-md-2 col-sm-12">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" name="cantidad" id="" value="{{$p->cantidad}}" style="width:3em;">
                </div>
                <div class="text-center pb-4 pt-4 col-md-2 col-sm-12">
                    Subtotal
                    <div class="text-center precio" style="font-size:22px">${{$p->precio * $p->cantidad}}</div>
                </div>
                <div class="pb-4 pt-4 col-md-2 col-sm-12 border-left">
                    <button class="btn btn-warning" type="submit">Actualiza</button>
                </div>
                <div class="pb-4 pt-4 col-md-2 col-sm-12">
                    <a class="btn btn-danger" href="/eliminaProdCar/{{$p->id}}">Eliminar</a>
                </div>
            </div>
        </form>
        @endforeach
        <div class="pt-4 pb-4 row">
            <div class="col-md-2 " style="font-size:25px">
                Total: ${{$total}}
            </div>
            <div class="col-md-4">
            <a class="btn" style="background-color: #598b2c; color: #f7ffe0;" href="/hacerPedido" onclick="pedido()">Realizar Pedido</a>
            </div>
        </div>

    @else
        <div>Aún no has agregado productos a tu carrito.</div>
    @endif
</div>


@endsection
<script>
function pedido(){
    alert("Tu pedido ha sido completado");
}
</script>