@extends('layouts.principal')

@section('content')
    <div class="container">
        
        <div class="card">
            <div class="card-header">
              <i class="fa fa-home" aria-hidden="true"></i> Agregar Tipo de Habitacion
            </div>
            <div class="card-body">
                    {!! Form::open(['route' => 'tipohabitacion.store', 'autocomplete' => 'off']) !!}
                        <div class="form-group">
                            <label>Tipo de Habitacion:</label>
                            {!! Form::text('tipo_h', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Precio:</label>
                            {!! Form::number('precio_h', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Detalles:</label>
                            {!! Form::textarea('detalles_h', null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Agregar Tipo de Habitacion', ['class' => 'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection