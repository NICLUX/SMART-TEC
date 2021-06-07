<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="es">
<!--<![endif]-->
<head>
    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smart Tec</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/images/logo/logo.jpg">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendors/font-awesome/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/vendors/jqvmap/dist/jqvmap.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
    <!-- Scripts -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>
<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav id="nav-menu" class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" ><img src="/images/logo/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" ><img src="/images/logo/logo.png" alt="Logo"></a>
        </div>
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav" id="lista">
                <li class="active">
                    <a href="/dashboard"> <i class="menu-icon fa fa-home"></i>Inicio</a>
                </li>

                @if(auth()->user()->is_admin == '1')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Administrador</a>
                        <ul class="sub-menu children dropdown-menu" id="lista">
                            <li><i class="fa fa-users"></i><a href="{{route("usuarios.index")}}">Usuarios</a></li>
                            <li><i class="fa fa-user-md"></i><a href="{{route("proveedores.index")}}">Proveedores</a></li>
                            <li><i class="fa fa-user-plus"></i><a href="{{route("clientes.index")}}">Clientes</a></li>
                            <li><i class="fa fa-dollar"></i><a href="{{route("apertura.index")}}">Apertura</a></li>
                            <li><i class="fa fa-money "></i><a href="{{route("venta.nuevo")}}">Punto de venta</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route("compras.index")}}">Compras</a></li>

                        </ul>
                    </li>
                @endif
                @if(auth()->user()->is_admin == '2' || auth()->user()->is_admin == '3')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-laptop"></i>Ventas</a>
                        <ul class="sub-menu children dropdown-menu" id="lista">
                            @if(auth()->user()->is_admin == '3')
                                <li><i class="fa fa-money "></i><a href="{{route("apertura.index")}}">Apertura de caja</a></li>
                            @endif
                            <li><i class="fa fa-money "></i><a href="{{route("venta.nuevo")}}">Punto de venta</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route("ventas_diarias.index")}}">Ventas diarias</a></li>
                        </ul>
                    </li>
                @endif

                @if(auth()->user()->is_admin == '1')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Catalogo</a>
                        <ul class="sub-menu children dropdown-menu" id="lista">
                            <li><i class="fa fa-product-hunt"></i><a href="{{route("productos.index")}}">Productos</a></li>
                            <li><i class="fa fa-product-hunt"></i><a href="{{route("servicios.index")}}">Servicios</a></li>
                            <li><i class="fa fa-cc-jcb"></i><a href="{{route("categorias.index")}}">Categorias</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pencil-square-o"></i>Detalles</a>
                        <ul class="sub-menu children dropdown-menu" id="lista">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route("ventas_diarias.index")}}">Ventas diarias</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route("vesta_total")}}">Total ventas diarias por empleado</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="{{route("ventas_mensuales.index")}}">Ventas mensuales</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="{{route("ventas_anuales.index")}}">Ventas Anuales</a></li>
                        </ul>
                    </li>

                @endif


                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pencil-square-o"></i>Enlaces Directos</a>
                    <ul class="sub-menu children dropdown-menu" id="lista">
                        <li id="letras" ><i class="menu-icon fa fa-sign-in"></i><a href="https://www.ip.gob.hn/"  target="_blank">Instituto de la Propiedad</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="https://www.sar.gob.hn/" target="_blank">SAR</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="https://www.sar.gob.hn/consulta-rtn/"  target="_blank">Consulta RTN SAR</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="https://placas.ip.gob.hn/enlace/consulta"  target="_blank">Consulta RTN IP</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="https://placas.ip.gob.hn/vehiculos"  target="_blank">Tasa Vehicular</a></li>
                    </ul>
                </li>     

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-info-circle"></i>Acerca de </a>
                    <ul class="sub-menu children dropdown-menu" id="lista">
                        <li><i class="menu-icon fa fa-coffee"></i><a href="{{route("acerca_de")}}">NiCLUX</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /navbar-collapse -->
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

        @livewire('navigation-dropdown')


    </header>
    <div class="content mt-3">
        <div class="min-h-screen bg-gray-100">
            <!-- Page Heading -->
            </header>
            @yield('content')
            @stack('modals')

            @livewireScripts
        </div> <!-- .content -->
    </div>
    <!-- /header --> <!-- Right Panel -->
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/main.js"></script>

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
    <script src="/assets/js/jQuery-2.1.4.min.js"></script>
    @stack('scripts')
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/bootstrap-select.min.js"></script>
    <script src="/assets/js/icheck.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="/assets/js/bootstrap-select.min.js"></script>
    <script src="/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";
            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: 'null',
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


</div>
</body>
<!--
        <style>
            #nav-menu{
                background: #C21234;
            }
            #left-panel{
                background: #C21234;
            }
            #lista{
                background: #C21234;
            }
            #left-panel{
                color: black;
            }

        </style> -->
</html>

