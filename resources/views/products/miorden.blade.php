@extends('layouts.principal')


@section('content')
    <div class="container">

        @if (session('info'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('info') }}!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('danger') }}!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-2" style="height: 200px;">
                    <div class="row g-0">
                        <div class="col-md-4 mt-3">
                            <img src="/assets/img/user.png" class="w-100" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><b>Informacion del cliente</b></h5>

                                <ul>
                                    <li>
                                        <p class="card-text">Nombre: {{ $reserva->nombre }}</p>
                                    </li>
                                    <li>
                                        <p class="card-text">Habitacion: H-{{ $reserva->room->id }}</p>
                                    </li>
                                </ul>

                                <p class="card-text"><small class="text-muted">Llego:
                                        {{ date('d-m-Y', strtotime($reserva->start)) }}</small></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-2" style="height: 200px;">

                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <!-- Sales Chart Canvas -->
                            <canvas id="myChart" height="225" style="height: 180px; display: block; width: 591px;"
                                width="738" class="chartjs-render-monitor"></canvas>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card my-2">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <br>
                        @if ($contador == 1)
                            <h4>{{ $contador }} Producto en tu carro.</h4><br>
                        @else
                            @if ($contador > 1)
                                <h4>{{ $contador }} Productos en tu carro.</h4><br>
                            @else
                                <h4>No hay productos en tu carro.</h4><br>
                            @endif
                        @endif



                        @foreach ($miorden as $orderproductdetail)
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="{{ asset($orderproductdetail->product->url) }}" class="img-thumbnail"
                                        width="200" height="200">
                                </div>
                                <div class="col-lg-5">
                                    <p>
                                        <b><a href="#">{{ $orderproductdetail->product->name_p }}</a></b><br>
                                        <b>Precio: </b>${{ $orderproductdetail->product->price_p }}<br>
                                        <b>Sub Total: </b>${{ $orderproductdetail->total }}<br>
                                        <b>Stock: </b>{{ $orderproductdetail->product->stock }} Productos.<br>

                                        @if ($orderproductdetail->product->stock == 0)
                                            <a href="{{ route('product.stock') }}" class="text-danger"><i
                                                    class="fa fa-close" aria-hidden="true"></i></a>

                                        @else
                                            @if ($orderproductdetail->product->stock <= $orderproductdetail->product->stock_min)
                                                <a href="{{ route('product.stock') }}" class="text-warning"><i
                                                        class="fa fa-warning" aria-hidden="true"></i></a>
                                            @endif
                                        @endif

                                    </p>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        {!! Form::model($orderproductdetail, ['route' => ['orderproduct.editarcantidad', $orderproductdetail], 'method' => 'PUT']) !!}

                                        <div class="form-group row">
                                            <input type="hidden" value="{{ $orderproductdetail->product->price_p }}"
                                                id="precio" name="precio">

                                            <input type="hidden" value="{{ $orderproductdetail->product->id }}"
                                                id="product_id" name="product_id">
                                            <input type="number" class="form-control form-control-sm"
                                                value="{{ $orderproductdetail->quantity }}" id="quantity" name="quantity"
                                                style="width: 70px; margin-right: 10px;"> <input type="hidden" id="total"
                                                name="total" step="0.001">

                                            <button class="btn btn-dark btn-sm" style="margin-right: 25px;"><i
                                                    class="fa fa-edit"></i></button>
                                        </div>
                                        {!! Form::close() !!}
                                        <form action="{{ route('orderproduct.eliminar', $orderproductdetail) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" style="margin-right: 10px;"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach

                        @if ($contador > 0)
                            <form action="{{ route('orderproduct.limpiarcarrito') }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="orden" value="{{ $orderproduct->id }}">

                                <button class="btn btn-warning btn-md" type="submit"><b>Limpiar Carrito</b></button>
                            </form>
                        @endif
                    </div>

                    @if ($contador > 0)
                        <div class="col-lg-5">
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Total: </b>${{ $suma }}</li>
                                </ul>
                            </div>
                            <br>

                            <div class="row">
                                <div class="center-block">
                                    <form class="inline-block formulario-cancelar"
                                        action="{{ route('orderproduct.cancelar') }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="orden" value="{{ $orderproduct->id }}">
                                        <button type="submit" class="btn btn-danger">Cancelar Compra</button>
                                    </form>
                                </div>
                                <div class="center-block mx-2"> <button href="{{ route('orderproduct.cobrar') }}"
                                        class="btn btn-success inline-block" data-toggle="modal"
                                        data-target=".bd-example-modal-lg">Continuar a Cobrar</button>
                                </div>
                            </div>

                        </div>
                    @endif

                </div>
            </div>
        </div>

        {{-- Mostrar todos los productos por livewire y un buscador --}}

        <div class="card mt-2">
            <div class="card-header bg-warning">
                <i class="fa fa-search" aria-hidden="true"></i> Buscar
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" name="buscar" id="buscar"
                        placeholder="Escribe el nombre del producto">
                </div>
            </div>
        </div>
        <div id="resultados">

        </div>
        <div class="row">
            @foreach ($products as $product)

                <div class="col-md-3">
                    <div class="card my-3" style="width: 16em">
                        <img src="{{ asset($product->url) }}" class="card-img-top" alt="{{ $product->name_p }}" />
                        <div class="card-body">
                            <h6 class="card-title"><b>#{{ $product->id }}</b><br><b>{{ $product->name_p }} -
                                    {{ $product->marca_p }}</b>
                            </h6>
                            <p class="card-text">
                                ${{ $product->price_p }}
                                @if ($product->stock == 0)
                                    <a href="{{ route('product.stock') }}" class="text-danger"><i
                                            class="fa fa-close" aria-hidden="true"></i></a>

                                @else
                                    @if ($product->stock <= $product->stock_min)
                                        <a href="{{ route('product.stock') }}" class="text-warning"><i
                                                class="fa fa-warning" aria-hidden="true"></i></a>
                                    @endif
                                @endif
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

        {{ $products->links() }}


    </div>

    {{-- modal --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b>Cobrar</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Total: </b>${{ $suma }}</li>
                        </ul>
                    </div>
                    <input type="hidden" name="total_suma" id="total_suma" value="{{ $suma }}" step="0.001"
                        oninput="calcular()">
                    <label for="">Recibo:</label>
                    <input type="text" class="form-control" name="recibo" id="recibo"
                        placeholder="Ingresa el dinero recibido" step="0.001" oninput="calcular()">

                    <label for="">Cambio:</label>
                    <input readonly class="form-control" name="cambio" id="cambio" step="0.001">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-block">Cobrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
                datasets: [{
                    label: 'Compras por dia',
                    data: [12, 19, 3, 5, 2, 3, 10],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        function calcular() {
            var a = parseFloat(document.getElementById("recibo").value) || 0,
                b = parseFloat(document.getElementById("total_suma").value) || 0;

            document.getElementById("cambio").value = a - b;

        }
    </script>

    <script>
        $('.formulario-cancelar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro de cancelar?',
                text: "¡Se eliminara permanentemente la compra!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, eliminar!',
                cancelButtonText: 'Cancelar'

            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection
