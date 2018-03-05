@extends('layouts.app')

@section('title', '| Add Role')

@section('content')

    <div class="col-md-10">

        <h1><i class='fa fa-key'></i> Agregar Rol</h1>
        <hr>

        {{ Form::open(array('url' => 'roles')) }}

        <div class="form-group">
            {{ Form::label('name', 'Nombre') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <h5><b>Asignar Permiso</b></h5>

        <div class='form-group'>
            @foreach ($permissions as $permission)
                {{ Form::checkbox('permissions[]',  $permission->id ) }}
                {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

            @endforeach
        </div>

        {{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@endsection