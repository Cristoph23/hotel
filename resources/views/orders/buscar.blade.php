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
                    {{-- <li class="list-group-item">Fecha entrada: {{date('d-m-Y', strtotime($reserva->start))}}</li>
                    <li class="list-group-item">Fecha salida: {{date('d-m-Y', strtotime($reserva->end))}}</li>
                    <li class="list-group-item">Dias de Hospedaje: {{$reserva->dias}}</li> --}}
                    <li class="list-group-item">Numero de Habitacion: H-{{$reserva->room->id}}</li>
                    {{-- <li class="list-group-item">Precio por dia de Habitacion: {{$reserva->room->typeroom->precio_h}}</li> --}}


                  </ul>

            </div>
        </div>

        <div class="card my-3" style="width: 18rem;">
            <img
              src="https://www.cocinayvino.com/wp-content/uploads/2018/02/64513894_ml-e1519846538696-1200x675.jpg"
              class="card-img-top"
              alt="Chicago Skyscrapers"
            />
            <div class="card-body">
              <h5 class="card-title"><b>#1</b><br><b>Hamburguesa Doble Carne</b></h5>
              <p class="card-text">
                Lechuga, Jamon, Piña, 500g de carne.
              </p>
            </div>
        
            <div class="card-body">
              <a href="#" class="card-link">Agregar al carrito</a>
            </div>
          </div>
    </div>
@endsection