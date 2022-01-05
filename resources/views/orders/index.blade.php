@extends('layouts.principal')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-cutlery" aria-hidden="true"></i> Ordenes
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'order.buscar', 'method' => 'GET']) !!}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Ingresa el folio de la reserva">
                    {!! Form::submit("Buscar", ['class' => 'btn btn-primary btn-block my-2']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection