{{-- \resources\views\users\edit.blade.php --}}

@extends('layouts.app')

@section('title', '| Editar Usuario')

@section('content')

    <div class="col-md-10">

        <h1><i class='fa fa-user-plus'></i> Editar {{$user->name}}</h1>
        <hr>

        {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, array('class' => 'form-control')) }}
        </div>

        <h5><b>Give Role</b></h5>

        <div class='form-group'>
            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                {{ Form::label($role->name, ucfirst($role->name)) }}<br>
            @endforeach
        </div>



        {{ Form::submit('Aceptar', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@endsection