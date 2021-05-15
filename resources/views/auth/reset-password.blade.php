<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<html lang="es">
<header>
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
    <link rel="stylesheet" type="text/css" href="/assets/css/rest.css">
    <style>
        h4{
            margin-top: 50%;
            margin-left: -23px;
            font-weight: normal;
            font-size: 50px;
            font-family: Gabriola;
            text-transform: uppercase;
        }
        h5{
            margin-left: 20%;
            margin-top: 15px;
            font-weight: normal;
            font-size: 32px;
            font-family: Gabriola;
            text-transform: uppercase;
        }
        h3{
            font-family: Gabriola;
        }
    </style>
</header>
<body>
<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
        <!-- Main Content -->
            <div class="container-fluid">
                <div class="row content bg-success text-center">
                    <div class="col-md-4 text-center company__info">
                        <span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
                        <h4 class="company_title">
                            SMART-TEC
                        </h4>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                        <div class="container-fluid">
                            <div class="row">
                                <h5>
                                    {{ __('Restaurar Contraseña') }}
                                </h5>
                                <h6 class="mb-4 text-sm text-gray-600">
                                    {{ __('Introduce tu dirección de correo electrónico para recuperar tu cuenta.') }}<hr>
                                </h6>
                            </div>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <div class="row">
                                    <input type="email" name="email" id="email" class="form__input" value="{{$request->email}}"
                                           placeholder="Ingrese su correo">
                                </div>
                                <div class="row">
                                    <input id="password" class="form__input" type="password" name="password"
                                           required autocomplete="new-password" placeholder="Ingrese una nueva contraseña"/>
                                </div>
                                <div class="row">
                                    <input id="password_confirmation" class="form__input" type="password"
                                           name="password_confirmation" required autocomplete="new-password" placeholder="Confirme la nueva contraseña"/>
                                </div>
                                <div class="row">
                                    <h6>
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}
                                            @endforeach
                                        @endif
                                    </h6>
                                </div>

                                <input type="submit"  value="Restablecer contraseña" class="btn float-right" style="margin-bottom: 20px">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
