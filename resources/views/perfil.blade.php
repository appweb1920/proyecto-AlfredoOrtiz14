@extends('layout')

@section('content')


<div class="p-4 border-bottom" style="font-size: 45px;">
    <div class="container">
        Mi perfil.
    </div>
</div>

<div class="container">
    <div class="row">
        Nombre: {{Auth::user()->name}}
    </div>
    <div class="row">
        Correo: {{Auth::user()->email}}
    </div>
    <div>
        Datos de entrega
        <div class="container">
            <div class="card">
                <div>
                    Direccion:
                    <input type="text" name="" id="">
                </div>
                
                <div>
                    Estado:
                </div>
                
                <div>
                    Ciudad:
                </div>

                
            </div>
            <button type="submit" class="btn" style="background-color: #598b2c; color: #f7ffe0; ">
                    {{ __('Guardar') }}
                </button>
        </div>
    </div>
</div>
@endsection