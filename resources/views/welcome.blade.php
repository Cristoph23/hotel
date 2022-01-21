@extends('layouts.principal')

@section('js')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
                    datasets: [{
                        label: 'Numero de ventas en miles',
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
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-body">
              <h3 class="card-title"><b>{{$habitaciones_o->count()}}</b></h3>
              <p class="card-text">Habitaciones Ocupadas</p>
            </div>
            <div class="card-footer text-center">
              Mas informacion <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-body">
              <h3 class="card-title"><b>{{$habitaciones_d->count()}}</b></h3>
              <p class="card-text">Habitaciones Desocupadas</p>
            </div>
            <div class="card-footer text-center">
              Mas informacion <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-body">
              <h3 class="card-title"><b>1</b></h3>
              <p class="card-text">Habitaciones en Servicio</p>
            </div>
            <div class="card-footer text-center">
              Mas informacion <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-body">
              <h3 class="card-title"><b>1</b></h3>
              <p class="card-text">Habitaciones sin funcionar</p>
            </div>
            <div class="card-footer text-center">
              Mas informacion <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
      </div>
        <div class="estadisticas">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            <i class="fa fa-calendar" aria-hidden="true"></i> Estadisticas de hoy 
                        </div>
                        <div class="card-body">
                            <div class="submenu">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="categoria-menu text-center">
                                                <span>$45,000.00</span>
                                                <a class="nav-link" href="#">Ganancias de hoy</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="categoria-menu text-center">
                                                <span>{{$habitaciones_o->count()}}</span>
                                                
                                                <a class="nav-link" href="#">Habitaciones Ocupadas</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="categoria-menu text-center">
                                                <span>12</span>
                                                <a class="nav-link" href="#">Nuevas Reservas</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="categoria-menu text-center">
                                                <span>4</span>
                                                <a class="nav-link" href="#">Actividades</a>
                                            </div>
                                        </div>
                                    </div>              
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <i class="fa fa-tag" aria-hidden="true"></i> Atajos Importantes
                        </div>
                        <div class="card-body">
                        <div class="row">

                            <div class="col">
                                <a href="#" style="text-decoration: none;">
                                    <div class="atajo text-center">
                                        <span><i class="fa fa-home" aria-hidden="true"></i></span>
                                    <p>Habitaciones</p>
                                    </div>
                                </a>
                                
                            </div>

                            <div class="col">
                                <a href="#" style="text-decoration: none;">
                                <div class="atajo text-center">
                                    <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <p>Empleados</p>
                                </div>
                                </a>
                            </div>

                            <div class="col">
                                <a href="#" style="text-decoration: none;">
                                <div class="atajo text-center">
                                    <span><i class="fa fa-power-off" aria-hidden="true"></i></span>
                                    <p>Cerrar Sesion</p>
                                </div>
                                </a>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="row">
          <div class="col-md-12 my-2">
            <div class="card">
              <div class="card-header bg-dark text-white" style="display: flex; align-items: stretch;">
                <h5 class="card-title"><b><i class="fa fa-money" aria-hidden="true"></i> Ventas Totales</b></h5>
                <a href="" style="margin-left: auto;">Crear Reporte</a>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Ventas: 27 Dic, 2021 - 2 Enero, 2022</strong>
                    </p>

                    <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                      <!-- Sales Chart Canvas -->
                      <canvas id="myChart" height="225" style="height: 180px; display: block; width: 591px;" width="738" class="chartjs-render-monitor"></canvas>

                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <img src="assets/img/ventas.jpg" class="w-100 d-block" alt="">
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer bg-dark text-white">
                <div class="row">
                  <div class="col">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fa fa-caret-up" aria-hidden="true"></i>17%</span>
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">TOTAL VENTAS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fa fa-caret-left" aria-hidden="true"></i> 0%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">VENTAS HABITACIONES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fa fa-caret-up" aria-hidden="true"></i> 20%</span>
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">VENTAS RESTAURANT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col">
                    <div class="description-block border-right">
                      <span class="description-percentage text-danger"><i class="fa fa-caret-down" aria-hidden="true"></i> 18%</span>
                      <h5 class="description-header">$12,000.00</h5>
                      <span class="description-text">VENTAS PRODUCTOS</span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="description-block">
                      <span class="description-percentage text-warning"><i class="fa fa-caret-left" aria-hidden="true"></i> 0%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">VENTAS SERVICIOS</span>
                    </div>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title"><b>Ordenes Restaurant</b></h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Item</th>
                  <th>Status</th>
                  <th>Popularity</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td><a href="pages/examples/invoice.html">OR9842</a></td>
                  <td>Call of Duty IV</td>
                  <td><span class="badge badge-success">Shipped</span></td>
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                  </td>
                </tr>
                <tr>
                  <td><a href="pages/examples/invoice.html">OR1848</a></td>
                  <td>Samsung Smart TV</td>
                  <td><span class="badge badge-warning">Pending</span></td>
                  <td>
                    <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                  </td>
                </tr>
                <tr>
                  <td><a href="pages/examples/invoice.html">OR7429</a></td>
                  <td>iPhone 6 Plus</td>
                  <td><span class="badge badge-danger">Delivered</span></td>
                  <td>
                    <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                  </td>
                </tr>
                <tr>
                  <td><a href="pages/examples/invoice.html">OR7429</a></td>
                  <td>Samsung Smart TV</td>
                  <td><span class="badge badge-info">Processing</span></td>
                  <td>
                    <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                  </td>
                </tr>
                <tr>
                  <td><a href="pages/examples/invoice.html">OR1848</a></td>
                  <td>Samsung Smart TV</td>
                  <td><span class="badge badge-warning">Pending</span></td>
                  <td>
                    <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                  </td>
                </tr>
                <tr>
                  <td><a href="pages/examples/invoice.html">OR7429</a></td>
                  <td>iPhone 6 Plus</td>
                  <td><span class="badge badge-danger">Delivered</span></td>
                  <td>
                    <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                  </td>
                </tr>
                <tr>
                  <td><a href="pages/examples/invoice.html">OR9842</a></td>
                  <td>Call of Duty IV</td>
                  <td><span class="badge badge-success">Shipped</span></td>
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
            <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
          </div>
          <!-- /.card-footer -->
        </div>

    </div>
@endsection