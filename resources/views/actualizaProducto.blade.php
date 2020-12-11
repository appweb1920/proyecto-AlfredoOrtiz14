@extends('layout')

@section('content')
<div class="p-4 border-bottom fondo" 
        style="font-size: 40px; color: #124e78; background-color:rgba(245, 245, 245, 0.5);">
    <div class="container">
        Actualizar producto
    </div>
</div>

<div class="container p-4 border-bottom" style="font-size: 20px;">
    <form action="/actualizaProd" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$p->id}}">
    <div class="col-md-12">
        <div class="text-center perf pb-2" style="font-size: 32px;">Actualiza la información del producto</div>
        <div class="container">
            <div class="card" style="background-color:rgba(245, 245, 245, 0.3);">
                <div class="card-body perf row col-md-12">
                    <div class="col-md-4">
                        <label for="nombre">Nombre </label>
                        <input type="text" class="form-control" name="nombre" id="" value="{{$p->nombre}}">
                    </div>

                    <div class="col-md-8">
                        <label for="descripcion">Descripción </label>
                        <textarea class="textProd form-control" name="descripcion" id="" cols="80" rows="3">{{$p->descripcion}}</textarea>
                    </div>
                
                </div>
                <div class="card-body perf row col-md-12">
                    <div class="col-md-4">
                        <label for="precio">Precio </label>
                        <input type="text" class="form-control" name="precio" id="" value="{{$p->precio}}">
                    </div>

                    <div class="col-md-4">
                        <label for="existencias">Existencias </label>
                        <input type="text" class="form-control" name="existencias" id="" value="{{$p->existencias}}">
                    </div>
                
                    <div class="col-md-4">
                    <label for="departamento">Departamento </label>
                        <select class="form-control" name="departamento" id="departamento" selected="{{$p->departamento}}">
                            @foreach($dep as $d)
                                <option value="{{ $d }}" {{$d == $p->departamento ? 'selected' : '' }}>{{ $d }}</option>
                                
                            @endforeach
                        
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