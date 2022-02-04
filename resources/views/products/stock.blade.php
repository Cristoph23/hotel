@extends('layouts.principal')

@section('content')
    <div class="container">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Alerta!!!</strong> Algunos productos estan por acabarse o se acabaron.
          </div>
        <div class="row">
            @foreach ($products as $product)
                @if ($product->stock <= $product->stock_min)
                <div class="col-md-3">
                    <div class="card my-3" style="width: 16em">
                        <img src="{{ asset($product->url) }}" class="card-img-top" alt="{{ $product->name_p }}" />
                        <div class="card-body text-white" style="background: #9b0000">
                            <h5 class="card-title"><b>#{{ $product->id }}</b><br><b>{{ $product->name_p }}</b></h5>
                            <p class="card-text">
                                @if ($product->stock == 1)
                                    Tienes: {{ $product->stock }} Producto
                                @else
                                    Tienes: {{ $product->stock }} Productos
                                @endif
                            </p>
                            <a href="{{ route('product.agregarstock', $product) }}" class="btn btn-success btn-block"><i class="fa fa-plus" aria-hidden="true"></i> Agregar productos</a>

                        </div>
                    </div>
                </div>
                @endif
                
            @endforeach
        </div>
    </div>

@endsection
