@extends('layouts.principal')

@section('content')
    <div class="container">

        <div class="card animate__animated animate__jackInTheBox">
            <div class="card-header bg-dark text-white">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i> Agregar Tienda
            </div>
            <div class="card-body">
                <form action="{{ route('shop.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nombre de la tienda:</label>
                        {!! Form::text('name_shop', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre']) !!}
                    </div>

                    {!! Form::submit('Agregar Tienda', ['class' => 'btn btn-primary btn-block mt-2']) !!}
                </form>
            </div>
        </div>
    </div>
@endsection

