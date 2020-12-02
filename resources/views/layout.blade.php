<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Muebles</title>
    <style>
    body{
        font-family: 'Work Sans', sans-serif;
    }
    .log{
        /*background-color: #d2bba0;
        background-color: #3d3522;*/
        background-color: #124e78;
    }
    .form.button{
        background-color:#f7ffe0;
    }
    .botF{
        background-color: #ddd8c4;
    }
    .botF:hover{
        background-color: #ABA798;
    } 
    .dep{
        color: black;
    }
    .perf{
        color: #df2935;
    }
    .textProd{
        font-size: 15px;
    }
    .fondo{
        background-image: url("img/pwoPoNOYOJ6Y8tQxsbVtH3AdUmdrdSD0F5urPPsi.jpeg");
    }
    /*.dep:hover{
        background-color: #ABA798;
    }*/
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm log">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="content">
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Busca">
                <button class="btn botF my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    
                </ul>

                
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" style="font-size: 20px; color: #f7ffe0;" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" style="font-size: 20px; color: #f7ffe0;" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" style="color: #f7ffe0" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/perfil">Mi perfil</a>
                                @if(Auth::user()->rol == 1)
                                <a class="dropdown-item" href="">Ver pedidos</a>
                                @else
                                <a class="dropdown-item" href="">Mis pedidos</a>
                                @endif
                                
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #ddd8c4">
        <div class="container">
            <button class="navbar-toggler dep" type="button" data-toggle="collapse" data-target="#navbarDep" aria-controls="navbarDep" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarDep">
                <div class="container row">
                    <div class="col p-0">
                        <a class="dep nav-link text-center border-left border-dark" href="/">Home</a>
                    </div>
                    <div class="col p-0">
                        <a class="dep nav-link text-center border-left border-dark" href="">Oficina</a>
                    </div>
                    <div class="col p-0">
                        <a class="dep nav-link text-center border-left border-dark" href="">Hogar</a>
                    </div>
                    @guest
                    <div class="col p-0">
                        <a class="dep nav-link text-center border-left border-dark border-right" href="">Cocina</a>
                    </div>
                    @else
                    @if(Auth::user()->rol == null)
                    <div class="col p-0">
                        <a class="dep nav-link text-center border-left border-dark" href="">Cocina</a>
                    </div>
                    <div class="col p-0">
                        <a class="dep nav-link text-center border-left border-dark border-right" href="">Pedido actual</a>
                    </div>
                    @else
                    <div class="col p-0">
                        <a class="dep nav-link text-center border-left border-dark border-right" href="/nuevoProducto">Agregar nuevo producto</a>
                    </div>
                    @endif
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</div>

<main>
            @yield('content')
</main>


</body>
</html>