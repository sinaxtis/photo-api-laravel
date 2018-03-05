@extends('layouts.app')

@section('title', '| Editar Rol')

@section('content')

    <div class="col-md-10">
        <h1><i class='fa fa-key'></i> Editar Rol: {{$role->name}}</h1>
        <hr>

        {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('name', 'Nombre') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <h5><b>Asignar Permisos</b></h5>
        @foreach ($permissions as $permission)

            {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
            {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

        @endforeach
        <br>
        {{ Form::submit('Editar', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>

@endsection