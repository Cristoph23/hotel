@extends('layouts.principal')

@section('content')
    <div class="container">
        <div class="estadisticas">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-calendar" aria-hidden="true"></i> Estadisticas de hoy 
                        </div>
                        <div class="card-body">
                            <div class="submenu">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="categoria-menu text-center">
                                                <span>$45,000.00</span>
                                                <a class="nav-link" href="#">Ganancias de hoy</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="categoria-menu text-center">
                                                <span>42</span>
                                                <a class="nav-link" href="#">Habitaciones Ocupadas</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="categoria-menu text-center">
                                                <span>12</span>
                                                <a class="nav-link" href="#">Nuevas Reservas</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="categoria-menu text-center">
                                                <span>4</span>
                                                <a class="nav-link" href="#">Actividades</a>
                                            </div>
                                        </div>
                                    </div>              
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-tag" aria-hidden="true"></i> Atajos Importantes
                        </div>
                        <div class="card-body">
                        <div class="row">

                            <div class="col">
                                <a href="#" style="text-decoration: none;">
                                    <div class="atajo text-center">
                                        <span><i class="fa fa-home" aria-hidden="true"></i></span>
                                    <p>Habitaciones</p>
                                    </div>
                                </a>
                                
                            </div>

                            <div class="col">
                                <a href="#" style="text-decoration: none;">
                                <div class="atajo text-center">
                                    <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <p>Empleados</p>
                                </div>
                                </a>
                            </div>

                            <div class="col">
                                <a href="#" style="text-decoration: none;">
                                <div class="atajo text-center">
                                    <span><i class="fa fa-power-off" aria-hidden="true"></i></span>
                                    <p>Cerrar Sesion</p>
                                </div>
                                </a>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection