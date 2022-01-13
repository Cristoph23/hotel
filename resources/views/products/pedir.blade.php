@extends('layouts.principal')

@section('content')
<div class="container">

    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('info')}}!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    <div class="card">
        <div class="card-header bg-dark text-white">
           <i class="fa fa-clipboard"></i> Informacion de la reserva
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

    <div class="card mt-2">
        <div class="card-header bg-warning">
            <i class="fa fa-search" aria-hidden="true"></i> Buscar
        </div>
        <div class="card-body">
            <div class="form-group">
              <input type="text"
                class="form-control" name="" id="" placeholder="Escribe el nombre del producto">
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3">
            <div class="card my-3" style="width: 16em">
                <img
                  src="{{ asset($product->url) }}"
                  class="card-img-top"
                  alt="{{$product->name_p}}"
                />
                <div class="card-body">
                  <h5 class="card-title"><b>#{{$product->id}}</b><br><b>{{$product->name_p}}</b></h5>
                  <p class="card-text">
                    ${{$product->price_p}}
                  </p>
                </div>
                
                <div class="card-body">
                    {!! Form::open(['route' => 'orderproduct.agregarproduct', 'autocomplete' => 'off']) !!}
                        <input type="hidden" name="orderproduct_id" value="{{$orderproduct->id}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="total" value="{{$product->price_p}}">
                        <input type="hidden" name="buscar" value="{{$reserva->id}}">


                        <button type="submit" class="btn btn-success">Agregar al carrito</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @endforeach

    </div>

    {{$products->links()}}
    
    
</div>

@endsection