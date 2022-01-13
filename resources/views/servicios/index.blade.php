@extends('layouts.principal')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
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
        <div class="card animate__animated animate__jackInTheBox">
            <div class="card-header bg-dark text-white">
              <i class="fa fa-hotel" aria-hidden="true"></i> Servicios
            </div>
            <div class="card-body">
                <table id="tabla" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>

                        <th scope="col">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{$service->id}}</td>
                                <td>{{$service->name_service}}</td>
                                <td>${{$service->price_service}}</td>

                                <td width="10px">
                                    <a href="#" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                    <form action="">
                                        <button type="submit" class="btn btn-danger mt-1"><i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>    
                        @endforeach
                        
                    </tbody>
                  </table>

                <a href="{{ route('servicio.create') }}" class="btn btn-primary btn-block my-3">Agregar Servicio</a>
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
    <script>
        $('#tabla').DataTable({
            responsive: true,
            autoWidth: false,

            "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No hay registros",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
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
@endsection