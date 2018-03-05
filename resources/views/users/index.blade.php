{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')

@section('content')

    <div class="col-md-10">
        <div class="table-responsive">
            <table class="table table-bordered">

                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Creación</th>
                    <th>Rol</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach ($users as $user)
                    <tr>

                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                        <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Editar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>


    </div>

@endsection