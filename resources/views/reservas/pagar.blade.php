@extends('layouts.principal')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Informacion de la reserva
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">Nombre del cliente: {{$reserva->nombre}}</li>
                    <li class="list-group-item">Fecha entrada: {{date('d-m-Y', strtotime($reserva->start))}}</li>
                    <li class="list-group-item">Fecha salida: {{date('d-m-Y', strtotime($reserva->end))}}</li>
                    <li class="list-group-item">Dias de Hospedaje: {{$reserva->dias}}</li>
                    <li class="list-group-item">Numero de Habitacion: H-{{$reserva->room->id}}</li>
                    <li class="list-group-item">Precio por dia de Habitacion: {{$reserva->room->typeroom->precio_h}}</li>


                  </ul>

                  <button class="btn btn-primary btn-block my-2" onclick="myFunction()">Cobrar</button>
            </div>
        </div>
        <div class="my-2" id="dform">
            <div class="card">
                <div class="card-header">
                    Reserva <b>#{{$reserva->id}}</b>
                </div>
                <div class="card-body">
                        {!! Form::model($reserva, ['route' => ['reserva.pagado', $reserva], 'autocomplete' => 'off', 'method' => 'put']) !!}
    
                        <div class="form-group d-none">
                            <input type="text" class="form-control" id="a" name="a" value="{{$reserva->dias}}">
                        </div>
                        <div class="form-group d-none">
                            <input type="text" class="form-control" id="b" name="b" value="{{$reserva->room->typeroom->precio_h}}">
                        </div>
    
                        <div class="form-group">
                            <label for="">Costo total de habitacion:</label>
                            <input type="text" class="list-group-item" id="total" name="total" readonly="readonly"  step="0.001">
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo_pago" id="tipo_pago" value="Efectivo" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              Efectivo
                            </label>
                        </div>
                        
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo_pago" id="tipo_pago" value="Tarjeta Credito / Debito">
                            <label class="form-check-label" for="exampleRadios2">
                              Tarjeta Credito / Debito
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo_pago" id="tipo_pago" value="Transferencia">
                            <label class="form-check-label" for="exampleRadios2">
                              Transferencia
                            </label>
                        </div>
                          
                        <button type="submit" class="btn btn-success btn-block my-2">Cobrar</button>
                        {!! Form::close() !!}
                        {{-- <a href="{{ route('reserva.download', $reserva) }}" class="btn btn-primary btn-block my-2">Imprimir</a> --}}
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section('js')
    <script>
        function myFunction() {
            var x = document.getElementById("dform");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }

            var a = parseFloat(document.getElementById("a").value) || 0,
            b = parseFloat(document.getElementById("b").value) || 0;
        
            document.getElementById("total").value = a * b;
        }
    </script>
@endsection