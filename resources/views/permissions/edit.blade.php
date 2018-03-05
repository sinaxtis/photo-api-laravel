@extends('layouts.app')

@section('title', '| Edit Permission')

@section('content')

    <div class="col-md-10">

        <h1><i class='fa fa-key'></i> Editar {{$permission->name}}</h1>
        <br>
        {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

        <div class="form-group">
            {{ Form::label('name', 'Nombre') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
        <br>
        {{ Form::submit('Editar', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@endsection