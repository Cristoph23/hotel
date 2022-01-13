@extends('layouts.principal')

@section('content')
    <div class="container">
        
        <div class="card">
            <div class="card-header">
              <i class="fa fa-home" aria-hidden="true"></i> Agregar Provedor
            </div>
            <div class="card-body">
                    {!! Form::open(['route' => 'provider.store', 'autocomplete' => 'off']) !!}
                        <div class="form-group">
                            <label>Nombre provedor:</label>
                            {!! Form::text('name_prov', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Telefono:</label>
                            {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                        </div>
                        
                        {!! Form::submit('Agregar Provedor', ['class' => 'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection