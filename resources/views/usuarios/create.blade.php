@extends('layouts.principal')

@section('content')
    <div class="container">
        
        <div class="card">
            <div class="card-header">
              <i class="fa fa-users" aria-hidden="true"></i> Agregar Empleado
            </div>
            <div class="card-body">
                    {!! Form::open(['route' => 'usuarios.store', 'autocomplete' => 'off']) !!}
                        <div class="form-group">
                            <label>Nombre:</label>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Clave</label>
                            {!! Form::text('password', null, ['class' => 'form-control']) !!}
                        </div>
                        <p class="h5">Asignar Rol</p>
                        @foreach ($roles as $role)
                            <div>
                                <label>
                                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                    {{-- {!! Form::radio('roles', $role->id, null, ['class' => 'mr-1']) !!} --}}
                                    {{$role->name}}
                                </label>
                            </div>
                        @endforeach

                        {!! Form::submit('Agregar Empleado', ['class' => 'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection