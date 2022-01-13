@extends('layouts.principal')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-cc-diners-club" aria-hidden="true"></i> <b>Cobrar</b>
            </div>
            <div class="card-body">
                
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- <script>
        function myFunction() {
            var x = document.getElementById("dform");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }

            var a = parseFloat(document.getElementById("a").value) || 0,
            b = parseFloat(document.getElementById("b").value) || 0;
        
            document.getElementById("total").value = a * b;
        }
    </script> --}}
@endsection