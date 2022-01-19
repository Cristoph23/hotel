@extends('layouts.principal')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-cc-diners-club" aria-hidden="true"></i> <b>Cobrar</b>
            </div>
            <div class="card-body">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Total: </b>${{ $reservaservice->service->price_service }}</li>
                    </ul>
                </div>
                <input type="hidden" name="total_suma" id="total_suma" value="{{ $reservaservice->service->price_service }}"
                    step="0.001" oninput="calcular()">
                <label for="">Recibo:</label>
                <input type="text" class="form-control" name="recibo" id="recibo" placeholder="Ingresa el dinero recibido"
                    step="0.001" oninput="calcular()">

                <label for="">Cambio:</label>
                <input readonly class="form-control" name="cambio" id="cambio" step="0.001">
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="center-block">
                        {!! Form::model($reservaservice, ['route' => ['reservaservice.pagado', $reservaservice], 'method' => 'put', 'autocomplete' => 'off']) !!}
                        <input type="hidden" name="total" id="total" value="{{ $reservaservice->service->price_service }}">
                        {!! Form::submit('Cobrar', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>

                    <div class="center-block mx-2">
                        <form action="{{ route('reservaservice.cancelar', $reservaservice) }}" method="POST">
                            @csrf
                            @method('delete')
                            {!! Form::submit('Cancelar', ['class' => 'btn btn-danger']) !!}
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function calcular() {
            var a = parseFloat(document.getElementById("recibo").value) || 0,
                b = parseFloat(document.getElementById("total_suma").value) || 0;

            document.getElementById("cambio").value = a - b;

        }
    </script>
@endsection
