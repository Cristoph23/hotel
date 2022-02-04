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
                <div class="card mb-2" style="height: 230px;">
                    <div class="row g-0">
                        <div class="col-md-4 mt-3">
                            <img src="/assets/img/reserva.png" class="w-100" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><b>Informacion de la habitacion</b></h5>

                                <ul>
                                    <li>
                                        <p class="card-text">Tipo habitacion: {{ $room->typeroom->type_room }}</p>
                                    </li>
                                    <li>
                                        <p class="card-text">Habitacion: H-{{ $room->id }}</p>
                                    </li>
                                    {{-- <li>
                                        <p class="card-text">Capacidad: {{ $room->capacidad }}</p>
                                    </li> --}}
                                    <li>
                                        <p class="card-text">Estado actual: {{ $room->status_r }}</p>
                                    </li>
                                    <li>
                                        <p class="card-text">Precio por noche adulto: ${{ $room->typeroom->price_adult }}</p>
                                    </li>
                                    <li>
                                        <p class="card-text">Precio por noche niño: ${{ $room->typeroom->price_kid }}</p>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-2" style="height: 230px;">

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
            <div class="card-header bg-dark text-white">
                <i class="fa fa-home" aria-hidden="true"></i> Recamara Suit <b>H-{{ $room->id }}</b>
            </div>
            <div class="card-body">
                <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-success my-2"><i
                        class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
                {{-- <button class="btn btn-primary my-2"><i class="fa fa-file" aria-hidden="true"></i> Exportar Excel</button> --}}
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
                                <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId"
                                    placeholder="">
                            </div>

                            <div class="form-group d-none">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" oninput="llenarTitle()"
                                    placeholder="Ingresa el nombre">
                            </div>

                            <div class="form-group d-none">
                                <input type="text" class="form-control" name="room_id" id="room_id"
                                    value="{{ $room->id }}">
                            </div>

                            <div class="form-group d-none">
                                <label for="start">Start</label>
                                <input type="date" class="form-control" name="start" id="start" step="0.001"
                                    oninput="comparar()">
                            </div>

                            <div class="form-group">
                                <label for="end">Fecha de salida</label>
                                <input type="date" class="form-control" name="end" id="end" step="0.001"
                                    oninput="comparar()">
                            </div>

                            {{-- <div class="form-group">
                                <label for="descripcion">Adultos</label>
                                <input type="text" class="form-control" name="adults" id="adults"
                                    placeholder="Ingresa los adultos a ingresar">
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Niños</label>
                                <input type="text" class="form-control" name="kids" id="kids"
                                    placeholder="Ingresa los niños a ingresar">
                            </div> --}}

                            <div class="form-group d-none">
                                <label for="">Dias en hospedaje</label>
                                <input type="number" class="form-control" name="dias" id="dias" step="0.001">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                        <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
                        <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                        <a class="btn btn-primary text-white" id="btnPagar">Pagar</a>


                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Crear -->
    <div class="modal fade bd-example-modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="overflow-y: scroll;">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Crear Reserva</h5>

                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'habitacion.store', 'autocomplete' => 'off', 'name' => 'calculadora']) !!}
                    <div class="form-row">
                        <div class="form-group col-md-12">

                            <label>Cliente:</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Ingresar usuario"
                                    aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success" type="button" id="button-addon2"
                                        data-toggle="modal" data-target="#exampleModal"><i class="fa fa-user-plus"
                                            aria-hidden="true"></i></button>
                                </div>
                            </div>

                        </div>
                        {{-- <div class="form-group col-md-6">
                            <label>Nombre:</label>
                            <input type="text" name="name" id="name" placeholder="Escribir nombre..." class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Apellidos:</label>
                            <input type="text" name="last_name" id="last_name" placeholder="Escribir apellidos..." class="form-control">
                        </div> --}}
                        <div class="form-group col-md-6">
                            <label>Fecha entrada:</label>
                            <input type="datetime-local" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Fecha salida:</label>
                            <input type="datetime-local" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Adultos:</label>
                            <input type="number" name="adults" id="adults" class="form-control" placeholder="Ingresa los adultos" step="0.001" oninput="calcularPrecio()">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Niños:</label>
                            <input type="number" name="kids" id="kids" class="form-control" placeholder="Ingresa los niños" step="0.001" oninput="calcularPrecio()" >
                        </div>

                        <div class="form-group col-md-6">
                            <label>Noches:</label>
                            <input type="number" name="nights" id="nights" class="form-control" placeholder="Ingresa las noches hospedadas" step="0.001" oninput="calcularPrecio()">
                        </div>

                        <div class="form-group col-md-6 d-none">
                            <input value="{{ $room->typeroom->price_adult }}" name="price_adults" id="price_adults" class="form-control" step="0.001" oninput="calcularPrecio()">
                        </div>
                        
                        <div class="form-group col-md-6 d-none">
                            <input value="{{ $room->typeroom->price_kid }}" name="price_kids" id="price_kids" class="form-control" step="0.001" oninput="calcularPrecio()">
                        </div>

                        <div class="form-group col-md-6">
                            <label>SubTotal:</label>
                            <input type="number" name="subtotal" id="subtotal" readonly class="form-control" step="0.001" oninput="calcularPrecio()">
                        </div>
                        <div class="form-group col-md-6">
                            <label>IVA:</label>
                            <select class="custom-select" name="impuesto" id="impuesto" step="0.001" oninput="calcularPrecio()">
                                <option selected>Seleccionar IVA</option>
                                @foreach ($impuestos as $impuesto)
                                    <option value="{{ $impuesto->porcentaje }}">{{ $impuesto->porcentaje }}%</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group col-md-6">
                            <label>IVA:</label>
                            <input name="impuesto" id="impuesto" type="number" class="form-control" step="0.001" oninput="calcularPrecio()">
                        </div> --}}
                        <div class="form-group col-md-6">
                            <label>Promocion:</label>
                            <input type="text" class="form-control" name="promocion" id="promocion" step="0.001" oninput="calcularPrecio()">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tipo de Registro:</label>
                            <select class="custom-select">
                                <option selected>Seleccionar tipo registro</option>
                                <option value="Reservar">Reservar</option>
                                <option value="Hospedar">Hospedar</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Total:</label>
                            <input type="text" name="total" id="total" readonly class="form-control" step="0.001" oninput="calcularPrecio()">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Adelanto:</label>
                            <input type="text" class="form-control" placeholder="Ingresa el adelanto" name="adelanto" id="adelanto" step="0.001" oninput="calcularPrecio()">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Falta:</label>
                            <input type="text" readonly class="form-control" name="falta" id="falta" step="0.001" oninput="calcularPrecio()">
                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>
                        Guardar</button>

                    {!! Form::close() !!}
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"
                            aria-hidden="true"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Usuario-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'customer.store']) !!}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nombre:</label>
                            <input type="text" name="name" id="name" placeholder="Escribir nombre..." class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Apellidos:</label>
                            <input type="text" name="last_name" id="last_name" placeholder="Escribir apellidos..." class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Telefono:</label>
                            <input type="tel" name="phone" id="phone" placeholder="Escribir telefono..." class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email:</label>
                            <input type="email" name="email" id="email" placeholder="Escribir email..." class="form-control">
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>
                        Guardar</button>

                    {!! Form::close() !!}
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"
                            aria-hidden="true"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      
    <script>
        function calcularPrecio() {
            var adults = parseFloat(document.getElementById("adults").value) || 0,
            kids = parseFloat(document.getElementById("kids").value) || 0,
            price_kids = parseFloat(document.getElementById("price_kids").value) || 0,
            price_adults = parseFloat(document.getElementById("price_adults").value) || 0,
            nights = parseFloat(document.getElementById("nights").value) || 0,
            impuesto = parseFloat(document.getElementById("impuesto").value) || 0,
            promocion = parseFloat(document.getElementById("promocion").value) || 0,
            adelanto = parseFloat(document.getElementById("adelanto").value) || 0,
            subtotal = document.getElementById("subtotal").value;
            // total = parseFloat(document.getElementById("subtotal").value) || 0;

        
            // subtotal = ((price_adults * adults) + (price_kids * kids)) * nights;

            document.getElementById("subtotal").value =  ((price_adults * adults) + (price_kids * kids)) * nights;
            if (impuesto < 10) {
                document.getElementById("total").value = ((parseFloat(document.getElementById("subtotal").value) * ('.' + 0 + impuesto)) + parseFloat(document.getElementById("subtotal").value)) - promocion;
            } else {
                document.getElementById("total").value = ((parseFloat(document.getElementById("subtotal").value) * ('.' + impuesto)) + parseFloat(document.getElementById("subtotal").value)) - promocion;
            }

            document.getElementById("falta").value =  parseFloat(document.getElementById("total").value;

        }
       
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let formulario = document.querySelector("#formularioEventos");
            var calendarEl = document.getElementById('agenda');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: "es",
                displayEventTime: false,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                // events: baseUrl+"/evento/mostrar",
                eventSources: {
                    url: baseUrl + "/reserva/mostrar/" + formulario.room_id.value,
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
                    axios.post(baseUrl + "/reserva/editar/" + info.event.id).
                    then(
                        (respuesta) => {
                            formulario.id.value = respuesta.data.id;
                            formulario.title.value = respuesta.data.title;
                            formulario.nombre.value = respuesta.data.nombre;
                            formulario.dias.value = respuesta.data.dias;
                            formulario.kids.value = respuesta.data.kids;
                            formulario.adults.value = respuesta.data.adults;


                            formulario.start.value = respuesta.data.start;
                            formulario.end.value = respuesta.data.end;


                            $("#modelId").modal("show");
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
                enviarDatos("/reserva/agregar");
            });

            document.getElementById("btnEliminar").addEventListener("click", function() {
                enviarDatos("/reserva/borrar/" + formulario.id.value);
            });

            document.getElementById("btnModificar").addEventListener("click", function() {
                enviarDatos("/reserva/actualizar/" + formulario.id.value);
            });

            document.getElementById("btnPagar").addEventListener("click", function() {
                window.location.href = baseUrl + '/reserva/pagar/' + formulario.id.value;
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

        });
    </script>

    <script>
        function llenarTitle() {
            let nombre = document.getElementById("nombre").value;
            document.getElementById("title").value = nombre;
        }
    </script>
@endsection
