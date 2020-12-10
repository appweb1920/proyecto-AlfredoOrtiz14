@extends('layout')

@section('content')

<div class="p-4 border-bottom fondo" 
        style="font-size: 40px; color: #124e78; background-color:rgba(245, 245, 245, 0.5);">
    <div class="container">
        Pedidos
    </div>
</div>
@if(!is_null($pedidos))
    @foreach($pedidos as $p)        
    <div class="container border mt-4 mb-4">
        <div class="row col-md-12">
            <div class="col-md-9 col-sm-12">
                <div class="row datos pl-3" style="font-size:22px">
                    <div class="col-md-3 pt-2 pl-1 pb-2 border-bottom">
                        Pedido: {{$p->id}}
                    </div>
                    <div class="col-md-5 pt-2 pl-1 pb-2 border-bottom">
                        Fecha: {{$p->created_at}}
                    </div>
                    <div class="col-md-4 pt-2 pl-1 pb-2 border-bottom">
                    Total: ${{$p->total}} 
                    </div>
                </div>

                <table class="table table-striped mt-2 tabla">
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
            <div class="col-md-3 col-sm-12 pt-4 border-left pl-4">
                <div class="card mb-4">
                    <div class="card-header">
                        Datos de entrega
                    </div>
                    <ul class="list-group list-group-flush">
                    @foreach($p->datosEntrega($p->id_cliente) as $c)
                        <li class="list-group-item">Nombre: {{$c->name}}</li>
                        <li class="list-group-item">Dirección: {{$c->direccion}}. {{$c->ciudad}}, {{$c->estado}}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
    @endforeach
@endif

@endsection