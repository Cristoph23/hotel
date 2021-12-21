@extends('layouts.principal')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
              <i class="fa fa-home" aria-hidden="true"></i> Asignar Roles
            </div>
            <div class="card-body">
                <table id="tabla" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Correo</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuario as $usuarios)
                            <tr>
                                <td>{{$usuarios->email}}</td>
                                <td></td>
                                <td width="10px"><a href="{{ route('roles.asignar', $usuarios) }}" class="btn btn-warning">Asignar Rol</a></td>
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
    <script>
        $('#tabla').DataTable({
            // "ajax": '../ajax/data/arrays.txt',
            // "columns": [
            //     {data: 'id'},
            //     {data: 'name'},
            //     {data: 'email'},
            // ],
            responsive: true,
            autoWidth: false,

            "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No hay registros",
            "info": "Mostrando pagina _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
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