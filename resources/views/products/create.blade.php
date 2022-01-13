@extends('layouts.principal')

@section('content')
    <div class="container">

        <div class="card animate__animated animate__jackInTheBox">
            <div class="card-header bg-danger text-white">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i> Agregar Producto
            </div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nombre del producto:</label>
                        {!! Form::text('name_p', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre']) !!}
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Marca</label>
                            {!! Form::text('marca_p', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la marca']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label>Precio</label>
                            {!! Form::text('price_p', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el precio']) !!}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Stock Minimimo</label>
                            {!! Form::text('stock_min', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el stock min']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label>Stock</label>
                            {!! Form::text('stock', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el stock total']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Provedor:</label>
                        {!! Form::select('provider_id', $providers, null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Imagen:</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="url" id="customFileLang" lang="es">
                                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tipo de venta: </label>
                            <div class="custom-control custom-radio">
                                {!! Form::radio('tipo_venta', 'Vender', true, ['class' => 'custom-control-input', 'id' => 'customRadio1']) !!}
                                <label class="custom-control-label" for="customRadio1">Vender</label>
                            </div>
                            <div class="custom-control custom-radio">
                              {!! Form::radio('tipo_venta', 'Rentar', null, ['class' => 'custom-control-input', 'id' => 'customRadio2']) !!}
                              <label class="custom-control-label" for="customRadio2">Rentar</label>
                            </div>
                        </div>
                    </div>

                    {!! Form::submit('Agregar Producto', ['class' => 'btn btn-primary btn-block mt-2']) !!}
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
