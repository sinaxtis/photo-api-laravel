{{-- \resources\views\permissions\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Crear Permiso')

@section('content')

    <div class="col-md-10">

        <h1><i class='fa fa-key'></i> Agregar Permiso</h1>
        <br>

        {{ Form::open(array('url' => 'permissions')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div><br>
        @if(!$roles->isEmpty())
        <h4>Agregar Permiso al rol</h4>

        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
        @endif
        <br>
        {{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@endsection