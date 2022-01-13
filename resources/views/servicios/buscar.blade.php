@extends('layouts.principal')

@section('content')
    <div class="container">
        @if (session('info'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('info') }}!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card mt-5 animate__animated animate__jackInTheBox">
            <div class="card-header bg-danger text-white">
                <i class="fa fa-search" aria-hidden="true"></i> <b>Buscar Cliente</b>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'servicio.buscador', 'method' => 'GET', 'autocomplete' => 'off']) !!}

                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="buscar" placeholder="Ingresa el folio" aria-label="Ingresa el folio" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-info" type="submit" id="button-addon2">Buscar</button>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection