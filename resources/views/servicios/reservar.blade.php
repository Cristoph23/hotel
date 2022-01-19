@extends('layouts.principal')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">

@endsection

@section('content')
    <div class="container">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{ session('info') }}</strong>
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

        <div class="card">
            <div class="card-header">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i> <b>{{$shop->name_shop}}</b>
            </div>
            <div class="card-body">
                <div id="agenda">
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Datos del evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formularioEventos">
                            @csrf
                            <div class="form-group d-none">
                                <label for="id">Id:</label>
                                <input type="text" class="form-control" name="id" id="id">
                            </div>

                            <div class="form-group d-none">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ $reserva->nombre }}">
                            </div>

                            <div class="form-group d-none   ">
                                <input type="text" class="form-control" name="reserva_id" id="reserva_id"
                                    value="{{ $reserva->id }}">
                            </div>

                            <div class="form-group">
                                <label for="start">Fecha - Hora Reserva</label>
                                <input type="datetime-local" class="form-control" name="start" id="start">
                            </div>

                            <div class="form-group">
                                <label>Servicios</label>
                                {!! Form::select('service_id', $misservicios, null, ['class' => 'form-control']) !!}
                            </div>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modelId2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Datos del evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formularioEventos2">
                            @csrf
                            <div class="form-group d-none">
                                <label for="id">Id:</label>
                                <input type="text" class="form-control" name="id" id="id">
                            </div>

                            <div class="form-group">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>

                            <div class="form-group d-none">
                                <input type="text" class="form-control" name="reserva_id" id="reserva_id">
                            </div>

                            <div class="form-group">
                                <label>Servicios</label>
                                {!! Form::select('service_id', $misservicios, null, ['class' => 'form-control']) !!}

                            </div>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                        <a class="btn btn-primary text-white" id="btnPagar">Pagar</a>


                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let formulario = document.querySelector("#formularioEventos");
            let formulario2 = document.querySelector("#formularioEventos2");

            var calendarEl = document.getElementById('agenda');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                locale: "es",
                displayEventTime: false,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridWeek'
                },
                // events: baseUrl+"/evento/mostrar",
                eventSources: {
                    url: baseUrl + "/servicio/mostrar",
                    method: "POST",
                    extraParams: {
                        _token: formulario._token.value,
                    }
                },
                dateClick: function(info) {
                    formulario.reset();
                    formulario.start.value = info.dateStr;
                    $("#modelId").modal("show");
                },
                eventClick: function(info) {
                    var evento = info.event;
                    console.log(evento);
                    axios.post(baseUrl + "/servicio/editar/" + info.event.id).
                    then(
                        (respuesta) => {
                            formulario2.id.value = respuesta.data.id;
                            formulario2.title.value = respuesta.data.title;
                            formulario2.reserva_id.value = respuesta.data.reserva_id;
                            formulario2.service_id.value = respuesta.data.service_id;


                            $("#modelId2").modal("show");
                        }
                    ).catch(
                        error => {
                            if (error.response) {
                                console.log(error.response.data);
                            }
                        }
                    )
                }
            });
            calendar.render();

            document.getElementById("btnGuardar").addEventListener("click", function() {
                enviarDatos("/servicio/agregar");
            });

            document.getElementById("btnEliminar").addEventListener("click", function() {
                enviarDatos2("/servicio/borrar/" + formulario2.id.value);
            });

            document.getElementById("btnPagar").addEventListener("click", function() {
                window.location.href = baseUrl + '/servicio/pagar/' + formulario2.id.value;
            });

            function enviarDatos(url) {
                const datos = new FormData(formulario);
                nuevaUrl = baseUrl + url;
                axios.post(nuevaUrl, datos).
                then(
                    (respuesta) => {
                        calendar.refetchEvents();
                        $("#modelId").modal("hide");
                    }
                ).catch(
                    error => {
                        if (error.response) {
                            console.log(error.response.data);
                        }
                    }
                )
            }

            function enviarDatos2(url) {
                const datos = new FormData(formulario2);
                nuevaUrl = baseUrl + url;
                axios.post(nuevaUrl, datos).
                then(
                    (respuesta) => {
                        calendar.refetchEvents();
                        $("#modelId2").modal("hide");
                    }
                ).catch(
                    error => {
                        if (error.response) {
                            console.log(error.response.data);
                        }
                    }
                )
            }

        });
    </script>
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
