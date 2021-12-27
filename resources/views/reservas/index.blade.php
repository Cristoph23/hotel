@extends('layouts.principal')

@section('content')
    <div class="container">
        <div class="row">
            
                <div class="col-sm-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                        <i class="fa fa-home" aria-hidden="true"></i> Recamara Suit
                        </div>
                        <div class="card-body">
                            @foreach ($recamara_suit as $rs)
                                @if ($rs->status_r == "Desocupado")
                                    <a href="{{ route('reserva.create', $rs) }}" class="btn btn-success btn-sm"><i class="fa fa-home" aria-hidden="true"></i> H-{{$rs->id}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                        <i class="fa fa-home" aria-hidden="true"></i> Recamara Individual
                        </div>
                        <div class="card-body">
                            @foreach ($recamara_individual as $ri)
                                @if ($ri->status_r == "Desocupado")
                                    <a href="{{ route('reserva.create', $ri) }}" class="btn btn-success btn-sm"><i class="fa fa-home" aria-hidden="true"></i> H-{{$ri->id}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                        <i class="fa fa-home" aria-hidden="true"></i> Recamara Matrimonial
                        </div>
                        <div class="card-body">
                            @foreach ($recamara_matrimonial as $rm)
                                @if ($rm->status_r == "Desocupado")
                                    <a href="{{ route('reserva.create', $rm) }}" class="btn btn-success btn-sm"><i class="fa fa-home" ama-hidden="true"></i> H-{{$rm->id}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                        <i class="fa fa-home" aria-hidden="true"></i> Recamara VIP
                        </div>
                        <div class="card-body">
                            @foreach ($recamara_VIP as $rv)
                                @if ($rv->status_r == "Desocupado")
                                    <a href="{{ route('reserva.create', $rv) }}" class="btn btn-success btn-sm"><i class="fa fa-home" aria-hidden="true"></i> H-{{$rv->id}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                        <i class="fa fa-home" aria-hidden="true"></i> Recamara Prime
                        </div>
                        <div class="card-body">
                            @foreach ($recamara_individual as $rp)
                                @if ($rp->status_r == "Desocupado")
                                    <a href="{{ route('reserva.create', $rp) }}" class="btn btn-success btn-sm"><i class="fa fa-home" aria-hidden="true"></i> H-{{$rp->id}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                        <i class="fa fa-home" aria-hidden="true"></i> Recamara Mega Suid
                        </div>
                        <div class="card-body">
                            @foreach ($recamara_mega as $rm)
                                @if ($rm->status_r == "Desocupado")
                                    <a href="{{ route('reserva.create', $rm) }}" class="btn btn-success btn-sm"><i class="fa fa-home" aria-hidden="true"></i> H-{{$rm->id}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

        </div>
        
    </div>
@endsection

@section('js')
   
@endsection