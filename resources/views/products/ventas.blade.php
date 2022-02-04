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
                <i class="fa fa-home" aria-hidden="true"></i> Ventas de productos
            </div>

            {{-- <div class="card-body">
                <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-success my-2"><i
                        class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
                <button class="btn btn-primary my-2"><i class="fa fa-file" aria-hidden="true"></i> Exportar Excel</button>

            </div> --}}

            <div class="card-body">
                <table id="tabla" class="table table-striped dt-responsive nowrap">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Reserva</th>
                            <th scope="col">Total</th>
                            <th scope="col">Fecha</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->reserva->nombre }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ date('d-m-Y', strtotime($order->created_at)) }} - {{ date('H:i', strtotime($order->created_at)) }}</td>
                            <td><a href="#" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
                "zeroRecords": "No hay registros",
                "info": "Mostrando pagina _PAGE_ de _PAGES_ de _TOTAL_ registros.",
                "infoEmpty": "No hay registros",
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
