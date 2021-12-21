@extends('layouts.principal')



@section('content')
    <div class="container">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
              <i class="fa fa-home" aria-hidden="true"></i> Asignar Roles a {{$user->name}}
            </div>
            <div class="card-body">
                <form>
                    <p class="h5">Nombre: </p>
                    <p class="form-control">{{$user->name}}</p>
                    <p class="h5">Listado de roles</p>
                    {!! Form::model($user, ['route' => ['roles.asignar.update', $user], 'method' => 'put']) !!}
                        @foreach ($roles as $role)
                            <div>
                                <label>
                                    {{-- {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!} --}}
                                    {!! Form::radio('roles', $role->id, null, ['class' => 'mr-1']) !!}
                                    {{$role->name}}
                                </label>
                            </div>
                        @endforeach
                        {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::close() !!}
                  </form>
            </div>
        </div>
    </div>
@endsection