<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<x-guest-layout>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
        <x-slot name="logo">
        </x-slot>
                <head>
                   <title>Smart Tec</title>
                            <meta name="description" content="Sufee Admin - HTML5 Admin Template">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <link rel="icon" href="/images/logo/logo3.png">
                            <link rel="apple-touch-icon" href="apple-icon.png">
                            <link rel="shortcut icon" href="favicon.ico">
                            <!--Made with love by Mutiullah Samim -->

                            <!--Bootsrap 4 CDN-->
                            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
                                  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

                            <!--Fontawesome CDN-->
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
                                  integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

                            <!--Custom styles-->
                            <link rel="stylesheet" type="text/css" href="/assets/css/login.css">

                 </head>

                 <body>
                        <div class="container h-100">
                            <div class="d-flex justify-content-center h-100">
                                <div class="user_card">
                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="container">
                                        <div class="d-flex justify-content-center h-100">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="brand_logo_container">
                                                        <img src="/images/logo/logo.png">
                                                    </div>
                                                    <x-jet-validation-errors class="mb-4" />
                                                </div>
                                                <div class="card-body">
                                                    <form method="POST" action="{{ route('login') }}">
                                                        @csrf
                                                        {{csrf_field()}}
                                                        <div class="input-group form-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                            </div>
                                                            <input id="usuario" class="form-control input_user" type="text" placeholder="Nombre de Usuario"
                                                                   name="usuario" :value="old('usuario')" required autofocus></div>

                                                        <div class="input-group form-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                            </div>
                                                            <input type="password" id="password" name="password" class="form-control input_pass"
                                                                   value="" placeholder="Comtraseña"  required autocomplete="current-password"></div>

                                                        <div class="row align-items-center remember">
                                                            <input type="checkbox">Recuérdame
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="submit" value="Ingresar" class="btn float-right login_btn">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </body>
                </div>
            </div>
        </div>
</x-guest-layout>
