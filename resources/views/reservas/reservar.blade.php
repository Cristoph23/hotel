@extends('layouts.principal')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">

@endsection

@section('content')
    <div class="container">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
            <div class="card mb-3">
                <div class="card-body">

                </div>
            </div>
            <div class="card">
                <div class="card-header bg-dark text-white">
                <i class="fa fa-home" aria-hidden="true"></i> Recamara Suit <b>H-{{$room->id}}</b>
                </div>
                <div class="card-body">
                        <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-success my-2"><i
                                class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
                        {{-- <button class="btn btn-primary my-2"><i class="fa fa-file" aria-hidden="true"></i> Exportar Excel</button>         --}}
                    <div id="agenda">
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                        <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                        </div>

                        <div class="form-group d-none">
                        <label for="title">Titulo</label>
                        <input type="text" class="form-control" name="title" id="title">
                        </div>

                        <div class="form-group">
                        <label for="descripcion">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" oninput="llenarTitle()" placeholder="Ingresa el nombre">
                        </div>

                        <div class="form-group d-none">
                            <input type="text" class="form-control" name="room_id" id="room_id" value="{{$room->id}}">
                        </div>

                        <div class="form-group d-none">
                        <label for="start">Start</label>
                        <input type="date" class="form-control" name="start" id="start" step="0.001" oninput="comparar()">
                        </div>

                        <div class="form-group">
                        <label for="end">Fecha de salida</label>
                        <input type="date" class="form-control" name="end" id="end" step="0.001" oninput="comparar()">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Adultos</label>
                            <input type="text" class="form-control" name="adults" id="adults" placeholder="Ingresa los adultos a ingresar">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Niños</label>
                            <input type="text" class="form-control" name="kids" id="kids" placeholder="Ingresa los niños a ingresar">
                        </div>

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
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Crear Reserva</h5>

                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'habitacion.store', 'autocomplete' => 'off']) !!}
                    <div class="form-row">
                    <div class="form-group col-md-12">

                        <label>Cliente:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Ingresar usuario" aria-describedby="button-addon2">
                            <div class="input-group-append">
                              <button class="btn btn-outline-success" type="button" id="button-addon2"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
                            </div>
                        </div>
                          
                    </div>
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
                        <input type="number" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Niños:</label>
                        <input type="number" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Dias:</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>SubTotal:</label>
                        <input type="number" readonly class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>IVA:</label>
                        <select class="custom-select">
                            <option selected>Seleccionar IVA</option>
                            @foreach ($impuestos as $impuesto)
                                <option value="{{$impuesto->id}}">{{$impuesto->porcentaje}}%</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Promocion:</label>
                        <input type="text" class="form-control">
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
                        <input type="text" readonly class="form-control">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        let formulario = document.querySelector("#formularioEventos");
        var calendarEl = document.getElementById('agenda');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale:"es",
            displayEventTime:false,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth'
            },
            // events: baseUrl+"/evento/mostrar",
            eventSources:{
                url: baseUrl+"/reserva/mostrar/"+formulario.room_id.value,
                method:"POST",
                extraParams: {
                _token: formulario._token.value,
                }
            },
            dateClick:function(info){
                formulario.reset();
                formulario.start.value=info.dateStr;
                $("#modelId").modal("show");
            },
            eventClick:function(info){
                var evento = info.event;
                console.log(evento);
                axios.post(baseUrl+"/reserva/editar/"+info.event.id).
                then(
                (respuesta) =>{
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
                error=>{
                    if (error.response) {
                    console.log(error.response.data);
                    }
                }
                )
            }
        });
        calendar.render();

        document.getElementById("btnGuardar").addEventListener("click", function(){
            enviarDatos("/reserva/agregar");
        });

        document.getElementById("btnEliminar").addEventListener("click", function(){
            enviarDatos("/reserva/borrar/"+formulario.id.value);
        });

        document.getElementById("btnModificar").addEventListener("click", function(){
            enviarDatos("/reserva/actualizar/"+formulario.id.value);
        });

        document.getElementById("btnPagar").addEventListener("click", function(){
            window.location.href = baseUrl+'/reserva/pagar/'+formulario.id.value;
        });

        function enviarDatos(url) {
            const datos = new FormData(formulario);
            nuevaUrl = baseUrl+url;
            axios.post(nuevaUrl, datos).
            then(
            (respuesta) =>{
                calendar.refetchEvents();
                $("#modelId").modal("hide");
            }
            ).catch(
            error=>{
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

        function comparar() {
            var fecha1 = document.getElementById('start').value;
            var fecha2 = document.getElementById('end').value;


            let milisegundosDia = 24 * 60 * 60 * 1000;

            let milisegundosDiasTranscurridos = Math.abs(new Date(fecha2).getTime() - new Date(fecha1).getTime());

            let diasTranscurridos =  Math.round(milisegundosDiasTranscurridos/milisegundosDia);
            
            document.getElementById("dias").value = diasTranscurridos + 1;



        }

       
        

    </script>
@endsection