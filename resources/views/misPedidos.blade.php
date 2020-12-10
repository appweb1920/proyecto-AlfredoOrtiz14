@extends('layout')

@section('content')
<style>
.datos{
    font-size:25px;
    background-color:rgba(245, 245, 245, 0.5);
}
.tabla{
    font-size:17px;
}
</style>

<div class="p-4 border-bottom fondo" 
        style="font-size: 40px; color: #124e78; background-color:rgba(245, 245, 245, 0.5);">
    <div class="container">
        Mis pedidos
    </div>
</div>

@if(!is_null($pedidos))
    @foreach($pedidos as $p)        
    <div class="container border mt-4 pb-4">
        <div class="row datos pl-3">
            <div class="col-md-3 pt-1 pl-1 pb-1 border-bottom">
                Id Pedido: {{$p->id}}
            </div>
            <div class="col-md-5 pt-1 pl-1 pb-1 border-bottom">
                Fecha: {{$p->created_at}}
            </div>
            
            <div class="col-md-4 pt-1 pl-1 pb-1 border-bottom">
            Total: ${{$p->total}} 
            </div>
        </div>

        <table class="table table-striped mt-2 col-lg-12 tabla">
        <thead>
            <tr class="table" style="background-color: #df2935; color: white;">
            <th scope="col">Producto</th>
            <th scope="col">Precio individual</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody class="col-lg-12">
            @foreach($p->detallePedido($p->id) as $dp)
                <tr>
                <th scope="row">{{$dp->nombre}}</th>
                <td>${{$dp->precio}}</td>
                <td>{{$dp->cantidad}}</td>
                <td>${{$dp->subtotal}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    @endforeach
@endif
@endsection