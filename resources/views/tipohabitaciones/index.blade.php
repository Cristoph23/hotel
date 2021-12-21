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
              <i class="fa fa-home" aria-hidden="true"></i> Tipos de habitaciones
            </div>
            <div class="card-body">
                <table id="tabla" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Tipo de habitacion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Detalles</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                  </table>

                <a href="#" class="btn btn-primary btn-block my-3">Agregar Tipo de Habitacion</a>
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
            autoWidth: false
        });
    </script>
@endsection