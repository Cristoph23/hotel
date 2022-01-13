@extends('layouts.principal')

@section('content')
<br>
<div class="container">
    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('info')}}!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{route('configuraciones.agregariva') }}" method="POST">
        @csrf
        <input type="hidden" name="porcentaje" id="porcentaje" value="10">
        <button type="submit" class="btn btn-primary float-right"><i class="fa fa-plus" aria-hidden="true"></i> Agregar IVA</button>
    </form>
    @include('plantillas.navconf')
    <br>
    @foreach ($impuestos as $impuesto)
    <div class="row">
        <div class="col-md-6">
            <h4 class="titulocof">IVA {{$impuesto->id}}</h4>
            <h6 class="subtitulo">{{$impuesto->porcentaje}}% de impuestos a pagar.</h6>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($impuesto, ['route' => ['configuraciones.editariva', $impuesto], 'method' => 'put', 'autocomplete' => 'off']) !!}
                        
                        <label for="">Porcentaje de impuestos:</label>
                        <div class="input-group mb-3">
                            {!! Form::text('porcentaje', null, ['class' => 'form-control', 'aria-describedby' => 'basic-addon2']) !!}
                            <div class="input-group-append">
                              <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div>
                          
                </div>

                <div class="card-footer text-right">
                    <div class="row">
                        <div class="center-block">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-dark btn-sm']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="center-block">
                            <form action="{{ route('configuraciones.eliminariva', $impuesto) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm mx-2 float-right">Eliminar</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>  
    </div>
    <hr>
    @endforeach
    
</div>
@endsection