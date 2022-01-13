<div>
    <div class="card mt-2">
        <div class="card-header bg-warning">
            <i class="fa fa-search" aria-hidden="true"></i> Buscar
        </div>
        <div class="card-body">
            <div class="form-group">
                <input type="text" class="form-control" name="" id="" placeholder="Escribe el nombre del producto">
            </div>
        </div>
    </div>
    
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-3">
                <div class="card my-3" style="width: 16em">
                    <img src="{{ asset($product->url) }}" class="card-img-top" alt="{{ $product->name_p }}" />
                    <div class="card-body">
                        <h5 class="card-title"><b>#{{ $product->id }}</b><br><b>{{ $product->name_p }}</b></h5>
                        <p class="card-text">
                            ${{ $product->price_p }}
                        </p>
                    </div>
    
                    <div class="card-body">
                        {!! Form::open(['route' => 'orderproduct.agregarproduct', 'autocomplete' => 'off']) !!}
                        <input type="hidden" name="orderproduct_id" value="{{ $orderproduct->id }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="total" value="{{ $product->price_p }}">
                        <input type="hidden" name="buscar" value="{{ $reserva->id }}">
    
    
                        <button type="submit" class="btn btn-success">Agregar al carrito</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

