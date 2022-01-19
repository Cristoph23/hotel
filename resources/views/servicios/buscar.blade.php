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


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Folio reserva</label>
                        <input type="text" class="form-control" name="buscar" placeholder="Ingresa el folio">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tienda</label>
                        {!! Form::select('shop', $shops, 'null', ['class' => 'form-control']) !!}
                    </div>
                </div>

                {!! Form::submit('Buscar', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
