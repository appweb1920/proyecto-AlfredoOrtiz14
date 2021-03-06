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
    <style>
    body{
        font-family: 'Work Sans', sans-serif;
    }
    </style>
    <title>Inicia Sesión</title>

</head>
<body>
    <div class="p-4 border-bottom" style="font-size: 45px; background-color: #124e78; color: #f7ffe0;">
        <div class="container">
            Iniciar sesión.
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 p-4">
                <div class="card">
                    <div class="card-body">
                        <div class="border-bottom row pl-4 pb-2">
                            Ingresa los datos de tu cuenta.
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row pt-4">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>El correo o la contraseña no coinciden, vuelve a ingresar tus datos.</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pb-4 border-bottom">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>El correo o la contraseña no coinciden, vuelve a ingresar tus datos.</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Inicia sesión') }}
                                </button>
                                <a href="/" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                <a class="text-center pb-2" href="{{ route('register') }}">¿Aún no tienes una cuenta? Regístrate</a>
                </div>
            </div>
        </div>
    </div>
</body>