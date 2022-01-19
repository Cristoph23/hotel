@extends('layouts.principal')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <i class="fa fa-home" aria-hidden="true"></i> Tipos de habitaciones
            </div>
            <div class="card-body">
                <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-success my-2"><i
                        class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
                <button class="btn btn-primary my-2"><i class="fa fa-file" aria-hidden="true"></i> Exportar Excel</button>

            </div>

            <div class="card-body">
                <table id="tabla" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tipo de habitacion</th>
                            <th scope="col">Precio Adulto</th>
                            <th scope="col">Precio Niño</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipos as $typeroom)
                            <tr>
                                <td>{{ $typeroom->id }}</td>
                                <td>{{ $typeroom->type_room }}</td>
                                <td>${{ $typeroom->price_adult }}</td>
                                <td>${{ $typeroom->price_kid }}</td>
                                <td width="10px">
                                    <a href="#" class="btn btn-success"><i class="fa fa-pencil"
                                            aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-warning"><i class="fa fa-eye"
                                            aria-hidden="true"></i></a>

                                    <form action="{{ route('tipohabitacion.destroy', $typeroom) }}"
                                        class="formulario-eliminar" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger mt-1"><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Modal Crear -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Agregar Tipo de Habitacion</h5>

                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'tipohabitacion.store', 'autocomplete' => 'off']) !!}
                    <div class="form-group">
                        <label>Tipo de Habitacion:</label>
                        {!! Form::text('type_room', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Precio Adulto:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                </div>
                                {!! Form::number('price_adult', null, ['class' => 'form-control', 'aria-describedby' => 'basic-addon1']) !!}

                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Precio Niño:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2">$</span>
                                </div>
                                {!! Form::number('price_kid', null, ['class' => 'form-control', 'aria-describedby' => 'basic-addon2']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Detalles:</label>
                        {!! Form::textarea('details_room', null, ['class' => 'form-control', 'rows' => '5', 'cols' => '50']) !!}
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#tabla').DataTable({
            responsive: true,
            autoWidth: false,

            "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No hay registros.",
                "info": "Mostrando pagina _PAGE_ de _PAGES_ de _TOTAL_ registros.",
                "infoEmpty": "No hay registros.",
                "infoFiltered": "(filtrado de _MAX_ total registros totales)",
                'search': 'Buscar:',
                'paginate': {
                    'next': 'Siguiente',
                    'previous': 'Anterior'
                }
            }
        });
    </script>
    @if (session('info'))
        <script>
            Swal.fire({
                // position: 'top-end',
                icon: 'success',
                title: 'Guardado',
                text: 'Se guardo correctamente el registro!!!',
                showConfirmButton: true,
            })
        </script>
    @endif

    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro de eliminarlo?',
                text: "Se eliminara permanentemente el registro!!!",
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

    @if (session('del'))
        <script>
            Swal.fire(
                'Eliminado!!!',
                'Se elimino correctamente el registro.',
                'success'
            )
        </script>
    @endif
@endsection
