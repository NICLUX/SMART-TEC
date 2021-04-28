@extends("layouts.main")
@extends("mejora_principal")
@extends("Servicios.mejora_vista")
@section("content")
@section("content")
    <style>
        img{
            height: 60%;
            width: 60%
        }
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
                                    <div class="media-body text-left">
                                        <h3 class="success">Citas En Linea IP</h3>
                                        <span>Detalle</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-user success font-large-2 float-right"></i>
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



            <div class="clearfix"></div>
            <!-- TABLAS -->
            <div class="orders">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">DESARROLLADORES</h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table table-sm">
                                        <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th class="avatar">Usuario</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Telefono</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="serial">1.</td>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                                                </div>
                                            </td>
                                            <td>  <span class="name">Cinthia Nicole</span> </td>
                                            <td> <span class="product">Cruz</span> </td>
                                            <td><span class="count">98534725</span></td>
                                        </tr>
                                        <tr>
                                            <td class="serial">2.</td>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <a href="#"><img class="rounded-circle" src="images/avatar/2.jpg" alt=""></a>
                                                </div>
                                            </td>
                                            <td>  <span class="name">Claudia Waleska</span> </td>
                                            <td> <span class="product">Molina</span> </td>
                                            <td><span class="count">97010131</span></td>
                                        </tr>
                                        <tr>
                                            <td class="serial">3.</td>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <a href="#"><img class="rounded-circle" src="images/avatar/3.jpg" alt=""></a>
                                                </div>
                                            </td>
                                            <td>  <span class="name">Luis</span> </td>
                                            <td> <span class="product">Chacon</span> </td>
                                            <td><span class="count">94673021</span></td>
                                        </tr>
                                        <tr>
                                            <td class="serial">4.</td>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <a href="#"><img class="rounded-circle" src="images/avatar/4.jpg" alt=""></a>
                                                </div>
                                            </td>
                                            <td>  <span class="name">Xavier Noe</span> </td>
                                            <td> <span class="product">Valdivia</span> </td>
                                            <td><span class="count">77665544</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div>  <!-- /.col-lg-8 -->

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">Administrador</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="images/m.jpg" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">German Alexis Cruz</h5>
                                    <div class="location text-sm-center"><i class="fa fa-map-marker"></i>Danlí, El Paraíso</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <a href="https://www.facebook.com/cruzgerman"><i class="fa fa-facebook pr-1"></i></a>
                                    <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                    <a href="https://www.linkedin.com/in/german-alexis-cruz-rodriguez-647ba0188"><i class="fa fa-linkedin pr-1"></i></a>
                                    <a href="gyldanli@gmail.com"><i class="fa fa-google pr-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@endsection
