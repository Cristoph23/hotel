@extends('layouts.principal')

@section('content')
    <div class="container">
        
        <div class="card">
            <div class="card-header">
              <i class="fa fa-home" aria-hidden="true"></i> Agregar Habitacion
            </div>
            <div class="card-body">
                    {!! Form::open(['route' => 'habitacion.store', 'autocomplete' => 'off']) !!}
                        <div class="form-group">
                            <label>Tipo de Habitacion:</label>
                            {!! Form::select('typeroom_id', $tipohabitaciones, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Capacidad:</label>
                            {!! Form::number('capacidad', null, ['class' => 'form-control']) !!}
                        </div>
                        
                        {!! Form::submit('Agregar Habitacion', ['class' => 'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection