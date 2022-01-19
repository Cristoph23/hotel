@extends('layouts.principal')

@section('content')
    <div class="container">

        <div class="card animate__animated animate__jackInTheBox">
            <div class="card-header bg-dark text-white">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i> Agregar Servicio
            </div>
            <div class="card-body">
                <form action="{{ route('servicio.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label>Tienda:</label>
                        {!! Form::select('shop_id', $shops, null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label>Nombre del servicio:</label>
                        {!! Form::text('name_service', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre']) !!}
                    </div>
                   
                    <div class="form-group">
                        <label>Precio:</label>
                        {!! Form::text('price_service', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el precio']) !!}
                    </div>
                    {!! Form::submit('Agregar Servicio', ['class' => 'btn btn-primary btn-block mt-2']) !!}
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $custom-file-text: (
            en: "Browse",
            es: "Elegir"
        );
    </script>
@endsection
