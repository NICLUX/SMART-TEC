@extends("layouts.main")
@extends("mejora_principal")
@extends("servicios.mejora_vista")
@section("content")
    <style>
    </style>
    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="icon-pencil primary font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="success">Consulta RTN IP</h3>
                                <span><a href="https://placas.ip.gob.hn/enlace/consulta"></a>Detalle</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="icon-speech warning font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="success">Consulta RTN SAR</h3>
                                <span>Detalle</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="icon-user warning font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="success">Citas En Linea IP</h3>
                                <span>Detalle</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="icon-pointer danger font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="success">Google Maps</h3>
                                <span>Detalle</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <body>

    <div class="grid-block"
         style="background-image: url('/assets/img/fondo-cabecera.jpg'); width: 100%; height: 100vh; ">

        <div class="clearfix"></div>
        <!-- TABLAS -->
        <div class="orders">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">{{auth()->user()->usuario}}</strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <h5 class="text-sm-center mt-2 mb-1">{{auth()->user()->name}}</h5>
                                <div class="location text-sm-center"><i class="fa fa-map-marker"></i> Danlí, El Paraíso
                                </div>
                            </div>
                            <hr>
                            <div class="card-text text-sm-center">
                                <a href="https://www.facebook.com/cruzgerman"><i class="fa fa-facebook pr-1"></i></a>
                                <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                <a href="https://www.linkedin.com/in/german-alexis-cruz-rodriguez-647ba0188"><i
                                        class="fa fa-linkedin pr-1"></i></a>
                                <a href="mailto:gyldanli@gmail.com"><i class="fa fa-google pr-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
@endsection


