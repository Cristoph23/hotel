@extends('layouts.principal')

@section('content')
    <div class="container">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        
        <div class="">
            <div class="card">
                <div class="card-header">
                <i class="fa fa-home" aria-hidden="true"></i> Recamara Suit
                </div>
                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
   
@endsection