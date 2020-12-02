@extends('layout')

@section('content')

<div class="p-4 border-bottom" style="font-size: 40px; color: #124e78; background-color:rgba(245, 245, 245, 0.5);">
        <div class="container">
            Mi Perfil
        </div>
    </div>



<div class="container p-4 border-bottom" style="font-size: 20px;">
    <form action="/perfilActualiza" method="post">
    @csrf
    <input type="hidden" name="id" value="{{Auth::user()->id}}">
    <div class="container pb-2">
        <div class="row">
            <label for="name">Nombre </label>
            <div name="name">: {{Auth::user()->name}}</div>
        </div>
        <div class="row">
            <label for="email">Correo </label>
            <div name="email">: {{Auth::user()->email}}</div>
        </div>
    </div>
    <div class="col-md-12 border-top ">
        <div class="text-center perf pt-2 pb-2" style="font-size: 32px;">Datos de entrega</div>
        <div class="container">
            <div class="card">
                <div class="card-body perf row col-md-12">
                    <div class="col-md-6">
                        <label for="name">Nombre: </label>
                        <input type="text" name="name" id="" value="{{Auth::user()->name}}">
                    </div>

                    <div class="col-md-6">
                        <label for="direccion">Dirección: </label>
                        <input type="text" name="direccion" id="" value="{{Auth::user()->direccion}}">
                    </div>
                </div>
                <div class="card-body perf row col-md-12">
                    <div class="col-md-6">
                        <label for="estado">Estado: </label>
                        <input type="text" name="estado" id="" value="{{Auth::user()->estado}}">
                    </div>
                    
                    <div class="col-md-6">
                    <label for="ciudad">Ciudad: </label>
                        <input type="text" name="ciudad" id="" value="{{Auth::user()->ciudad}}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn mt-4 text-center" style="background-color: #598b2c; color: #f7ffe0; ">
                    {{ __('Guardar') }}
            </button>
        </div>
    </div>
    </form>
</div>
@endsection