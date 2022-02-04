@extends('layouts.principal')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="margin-bottom: 40px">
                <div class="wrimagecard wrimagecard-topimage" style="height: 120px">
                    <a href="{{ route('product') }}">
                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><i class="fa fa-shopping-bag" style="color:#1697a0"></i>
                            </center>
                        </div>
                        
                        <div class="card-footer text-center text-dark" style="background-color: rgb(61, 192, 209)">
                            <b>Productos</b>
                            <i class="fa fa-arrow-circle-right" style="font-size: 15px"></i>
                        </div> 
                    </a>
 
                </div>
            </div>
            <div class="col-md-3" style="margin-bottom: 40px">
                <div class="wrimagecard wrimagecard-topimage" style="height: 120px">
                    <a href="{{ route('orderproduct') }}">
                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><i class="fa fa-shopping-cart" style="color:#1697a0"></i></center>
                        </div>

                        <div class="card-footer text-center text-dark" style="background-color: rgb(61, 192, 209)">
                            <b>Crear Pedido</b>
                            <i class="fa fa-arrow-circle-right" style="font-size: 15px"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3" style="margin-bottom: 40px">
                <div class="wrimagecard wrimagecard-topimage" style="height: 120px">
                    <a href="{{ route('product.reporte') }}">
                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><i class="fa fa-file-pdf-o" style="color:#1697a0"></i></center>
                        </div>
                        
                        <div class="card-footer text-center text-dark" style="background-color: rgb(61, 192, 209)">
                            <b>Reportes</b>
                            <i class="fa fa-arrow-circle-right" style="font-size: 15px"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3" style="margin-bottom: 40px">
                <div class="wrimagecard wrimagecard-topimage" style="height: 120px">
                    <a href="#">
                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><i class="fa fa-reply-all" style="color:#1697a0"></i></center>
                        </div>
                        
                        <div class="card-footer text-center text-dark" style="background-color: rgb(61, 192, 209)">
                            <b>Devoluciones</b>
                            <i class="fa fa-arrow-circle-right" style="font-size: 15px"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3" style="margin-bottom: 40px">
                <div class="wrimagecard wrimagecard-topimage" style="height: 120px">
                    <a href="{{ route('provider') }}">
                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><i class="fa fa-truck" style="color:#1697a0"></i></center>
                        </div>
                        
                        <div class="card-footer text-center text-dark" style="background-color: rgb(61, 192, 209)">
                            <b>Provedores</b>
                            <i class="fa fa-arrow-circle-right" style="font-size: 15px"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3" style="margin-bottom: 40px">
                <div class="wrimagecard wrimagecard-topimage" style="height: 120px">
                    <a href="{{ route('product.stock') }}">
                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><i class="fa fa-warning" style="color:#1697a0"></i></center>
                        </div>
                        
                        <div class="card-footer text-center text-dark" style="background-color: rgb(61, 192, 209)">
                            <b>Alerta Stock</b>
                            <i class="fa fa-arrow-circle-right" style="font-size: 15px"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3" style="margin-bottom: 40px">
                <div class="wrimagecard wrimagecard-topimage" style="height: 120px">
                    <a href="{{ route('product.venta') }}">
                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><i class="fa fa-money" style="color:#1697a0"></i></center>
                        </div>
                        
                        <div class="card-footer text-center text-dark" style="background-color: rgb(61, 192, 209)">
                            <b>Ventas</b>
                            <i class="fa fa-arrow-circle-right" style="font-size: 15px"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3" style="margin-bottom: 40px">
                <div class="wrimagecard wrimagecard-topimage" style="height: 120px">
                    <a href="#">
                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><i class="fa fa-cc-diners-club" style="color:#1697a0"></i></center>
                        </div>
                        
                        <div class="card-footer text-center text-dark" style="background-color: rgb(61, 192, 209)">
                            <b>Movimientos en Cajas</b>
                            <i class="fa fa-arrow-circle-right" style="font-size: 15px"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection