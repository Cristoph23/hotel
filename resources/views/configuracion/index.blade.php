@extends('layouts.principal')

@section('content')
    <br>
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#">Princiapl</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">IVA</a>
            </li>
            
          </ul>
        <br>
        <div class="row">
            <div class="col-md-6">
                <h4 class="titulocof">Nombre</h4>
                <h6 class="subtitulo">Ingresa el nombre de tu hotel.</h6>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open() !!}
                            <div class="form-group">
                                <input type="input" class="form-control" placeholder="Ingresa el nombre">
                            </div>
                              
                    </div>

                    <div class="card-footer text-right">
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-dark btn-sm']) !!}
                        {!! Form::close() !!} 
                    </div>
                </div>
            </div>  
        </div>

        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4 class="titulocof">Logo</h4>
                <h6 class="subtitulo">Ingresa tu logo para personalizar tu pagina web.</h6>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open() !!}
                            <div class="form-group">
                                <input type="file" class="form-input">
                            </div>
                              
                    </div>

                    <div class="card-footer text-right">
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-dark btn-sm']) !!}
                        {!! Form::close() !!} 
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection