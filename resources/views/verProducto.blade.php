@extends('layout')

@section('content')

<div class="container pt-4">
    <div class="col-md-12 row">
        <div class="col-md-6 col-sm-12 border">
            <img src="{{ asset('storage/img/'.$p->foto)}}" class="img-fluid" alt="">
        </div>
        <div class="col-md-6 col-sm-12">
            <input type="hidden" name="id" value="{{$p->id}}">
            <div class="" style="font-size:35px;">{{$p->nombre}}</div>
            <div class="border-top" style="font-size:30px;">{{$p->descripcion}}</div>
            <div class="border-bottom precio" style="font-size:30px;">${{$p->precio}}</div>
            @guest
            @else
            <div class="" style="font-size:30px;">Existencias: {{$p->existencias}}</div>
                <div class="row">
                @if(Auth::user()->rol == 1)
                    <div class="col pt-3">
                        <a href="/actualizaProducto/{{$p->id}}"  class="btn btn-warning">Editar</a>
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

@endsection