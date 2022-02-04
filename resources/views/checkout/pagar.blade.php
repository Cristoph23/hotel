@extends('layouts.principal')

@section('content')
    <div class="container">
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

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table id="tabla" class="table table-striped dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>        
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderdetails as $orderdetail)
                                    <tr>
                                        <td>{{ $orderdetail->product->name_p }}</td>
                                        <td>${{ $orderdetail->product->price_p }}</td>
                                        <td>{{ $orderdetail->quantity }}</td>
                                        <td>${{ $orderdetail->total }}</td>

                                    </tr>
                                @endforeach
        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        
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