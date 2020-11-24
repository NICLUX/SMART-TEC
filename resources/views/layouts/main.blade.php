<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smart Tec</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/images/logo/logo.jpg">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/vendors/jqvmap/dist/jqvmap.min.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />



    <link rel="stylesheet" href="/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    @livewireStyles
</head>

<body>


<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/"><img src="/images/logo/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="/images/logo/logo.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/"> <i class="menu-icon fa fa-home"></i>Inicio </a>
                </li>
               <!--  <h3 class="menu-title">Administracion</h3> --><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Administrador</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-users"></i><a href="ui-buttons.html">Usuarios</a></li>
                        <li><i class="fa fa-user-md"></i><a href="{{route("proveedores.index")}}">Proveedores</a></li>
                        <li><i class="fa fa-user-plus"></i><a href="{{route("clientes.index")}}">Clientes</a></li>

                        <li><i class="fa fa-dollar"></i><a href="{{route("apertura.index")}}">Apertura</a></li>
                        <li><i class="fa fa-money "></i><a href="ui-buttons.html">Punto de venta</a></li>
                    </ul>
                </li>


                <!-- <h3 class="menu-title">Productos</h3> --> <!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Productos</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-product-hunt"></i><a href="{{route("categorias.index")}}">Productos</a></li>
                        <li><i class="fa fa-servise-hunt"></i><a href="{{route("servicios.index")}}">Servicios</a></li>
                    </ul>

                </li>

               <!--  <h3 class="menu-title">Inventarios</h3> --><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>General</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-product-hunt"></i><a href="{{route("inventario.index")}}">Inventario</a></li>
                    </ul>
                </li>

                <!-- <h3 class="menu-title">Informes</h3> --><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pencil-square-o"></i>Informes</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route("ventas.index")}}">Ventas</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Ventas diarias</a></li>
                        <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Ventas mensuales</a></li>
                        <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Ventas Anuales</a></li>
                    </ul>
                </li>


                <!-- <h3 class="menu-title">Informacion</h3> --><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-info-circle"></i>Acerca de </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-coffee"></i><a href="page-login.html">NiCLUX</a></li>
                    </ul>
                </li>


            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>

            </div>
        </div>
        <div >
            <div class="btn-group dropright float-right">
                <button class="btn btn-dark dropdown-toggle btn-sm" type="button" id="dropdown2" data-toggle="dropdown">

                </button>
                <div class="dropdown-menu">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                    <div>
                        <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Prerfil') }}
                        </x-jet-responsive-nav-link>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                            {{ __('Salir') }}
                        </x-jet-responsive-nav-link>
                    </form>
                </div>
            </div>

        </div>
    </header><!-- /header -->
    <!-- Header-->


    <div class="content mt-3">
        @yield('content')
        @stack('scripts')


    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="/vendors/jquery/dist/jquery.min.js"></script>
<script src="/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/js/main.js"></script>
@livewireScripts
<script>
    $('#modalBorrarApertura').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id_apertura = button.data('id');

        var modal = $(this);
        modal.find('.modal-footer #idApertura').val(id_apertura);

    })
</script>

<script src="/vendors/chart.js/dist/Chart.bundle.min.js"></script>
<script src="/assets/js/dashboard.js"></script>
<script src="/assets/js/widgets.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);

</script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('#selectProducto').select2({
            placeholder: "Seleccione un producto",
            allowClear: true
        });
    });
</script>

</body>
</html>
