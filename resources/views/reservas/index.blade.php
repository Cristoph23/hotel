@extends('layouts.principal')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Status</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>Selecciona el Status...</option>
                            <option value="Ocupado">Ocupado</option>
                            <option value="Desocupado">Desocupado</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Categoria</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>Selecciona la categoria...</option>
                            @foreach ($typerooms as $typeroom)
                                <option value="{{$typeroom->id}}">{{$typeroom->type_room}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($rooms as $room)

                @if ($room->status_r == 'Ocupado')
                    <div class="col-md-3">
                        <div class="wrimagecard wrimagecard-topimage">
                            <a href="{{ route('reserva.create', $room) }}">
                                <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                    <center><i class="fa fa-bed" style="color:#16A085"></i></center>
                                </div>
                                <div class="wrimagecard-topimage_title">
                                    <h5><b>H-{{ $room->id }}</b></h5>
                                    <h6>{{ $room->typeroom->type_room }}</h6>
                                </div>
                            </a>
                            <a href="">
                                <div class="card-footer text-center text-white" style="background-color: rgb(55, 206, 148)">
                                    <b>Mas Informacion</b>
                                    <i class="fa fa-arrow-circle-right" style="font-size: 15px"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
                 @if ($room->status_r == 'Desocupado')
                        <div class="col-md-3">
                            <div class="wrimagecard wrimagecard-topimage">
                                <a href="{{ route('reserva.create', $room) }}">
                                    <div class="wrimagecard-topimage_header"
                                        style="background-color: rgba(160, 22, 22, 0.1)">
                                        <center><i class="fa fa-bed" style="color:#ffc4c4 "></i></center>
                                    </div>
                                    <div class="wrimagecard-topimage_title">
                                        <h5><b>H-{{ $room->id }}</b></h5>
                                        <h6>{{ $room->typeroom->type_room }}</h6>
                                    </div>
                                </a>
                                <a href="">
                                    <div class="card-footer text-center text-white"
                                        style="background-color: rgb(212, 71, 71)">
                                        <b>Mas Informacion</b>
                                        <i class="fa fa-arrow-circle-right" style="font-size: 15px"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
            @endforeach

        </div>
    </div>
@endsection

@section('js')

@endsection
