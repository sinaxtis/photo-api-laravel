{{-- \resources\views\permissions\index.blade.php --}}
@extends('layouts.app')

@section('content')

    <div class="col-md-10">
        <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Agregar nuevo permiso</a>
        <br><br>
<div class="table-responsive">
    <table class="table table-bordered table-striped">

        <thead>
        <tr>
            <th>Permiso</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
                <td>
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Editar</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</div>

@endsection