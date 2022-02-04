@extends('layouts.principal')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-2" style="height: 200px;">
                    <div class="row g-0">
                        <div class="col-md-4 mt-3">
                            <img src="/assets/img/stock_plus.png" class="w-100 ml-2" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><b>Informacion del producto</b></h5>
    
                                <ul>
                                    <li>
                                        <p class="card-text"><b>Nombre:</b> {{$product->name_p}}</p>
                                    </li>
                                    <li>
                                        <p class="card-text"><b>Marca:</b> {{$product->marca_p}}</p>
                                    </li>
                                    <li>
                                        <p class="card-text"><b>Precio:</b> ${{$product->price_p}}</p>
                                    </li>
                                </ul>
    
                                <p class="card-text"><small class="text-muted">Productos Restantes: {{$product->stock   }}</small></p>
    
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
            <div class="col-md-12">
                <div class="card mb-2">
                    
                    <div class="card-body">
                        <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-success my-2"><i class="fa fa-download" aria-hidden="true"></i> Historial de Venta</button>
                        <form action="">
                            <div class="form-group">
                                <label for="">Cantidad a agregar</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                      <button class="btn btn-outline-success" type="submit">Agregar</button>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
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

@endsection