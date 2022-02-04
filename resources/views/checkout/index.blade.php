@extends('layouts.principal')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="text-center" style="font-weight: bold">Check-Out</h2>
                <div class="form-group">
                    <input type="date" class="form-control"> 
                    Check-Out del <b><i class="fa fa-calendar" aria-hidden="true"></i> {{ date('d-m-Y') }}</b>

                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($reservas as $reserva)
                <div class="col-md-3">
                    <div class="wrimagecard wrimagecard-topimage">
                        <a href="{{ route('checkout.pagar', $reserva) }}">
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(153, 102, 35, 0.1)">
                                <center><i class="fa fa-bed" style="color:#f88855"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                <h5><b>H-{{ $reserva->room->id }}</b></h5>
                                <h6>{{ $reserva->room->typeroom->type_room }}</h6>
                            </div>
                        
                            <div class="card-footer text-center text-white" style="background-color: rgb(240, 139, 57)">
                                <b>Salida: </b>{{date('H:i', strtotime($reserva->end))}}
                                
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
