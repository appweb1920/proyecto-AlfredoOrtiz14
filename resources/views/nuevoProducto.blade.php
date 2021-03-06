@extends('layout')

@section('content')
<div class="p-4 border-bottom fondo" 
        style="font-size: 40px; color: #124e78; background-color:rgba(245, 245, 245, 0.5);">
    <div class="container">
        Insertar nuevo producto
    </div>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $e)
            <p>{{$e}}</p>
        @endforeach
    </div>
@endif

<div class="container p-4 border-bottom" style="font-size: 20px;">
    <form action="/insertaProducto" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12">
        <div class="text-center perf pb-2" style="font-size: 32px;">Ingresa la información del nuevo producto</div>
        <div class="container">
            <div class="card" style="background-color:rgba(245, 245, 245, 0.3);">
                <div class="card-body perf row col-md-12">
                    <div class="col-md-4">
                        <label for="nombre">Nombre </label>
                        <input class="form-control" type="text" name="nombre" id="">
                    </div>

                    <div class="col-md-8">
                        <label for="descripcion">Descripción </label>
                        <textarea class="textProd form-control" name="descripcion" id="" cols="80" rows="3"></textarea>
                    </div>
                
                </div>
                <div class="card-body perf row col-md-12">
                    <div class="col-md-4">
                        <label for="precio">Precio </label>
                        <input class="form-control" type="text" name="precio" id="">
                    </div>

                    <div class="col-md-4">
                        <label for="existencias">Existencias </label>
                        <input class="form-control" type="text" name="existencias" id="">
                    </div>
                    
                    <div class="col-md-4">
                    <label for="departamento">Departamento </label>
                        <select class="form-control" name="departamento" id="">
                            <option value="oficina">Oficina</option>
                            <option value="cocina">Cocina</option>
                            <option value="hogar">Hogar</option>
                        </select>
                    </div>
                </div>
                
                <div class="card-body perf row col-md-12">
                    <div class="col-md-2">
                    <label for="foto">Imagen </label>
                        <input type="file" name="foto" id="foto" accept="image/png, image/jpg, image/jpeg" style="font-size:15px; color:black;">
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