@extends('layouts.app')

@section('content')
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Photo {{ $photo->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/photo') }}" title="Regresar"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/admin/photo/' . $photo->id . '/edit') }}" title="Editar foto"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('admin/photo' . '/' . $photo->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Photo" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $photo->id }}</td>
                                    </tr>
                                    <tr><th>Usuario</th><td> {{ App\User::find($photo->user_id) }}</td></tr>
                                    <tr><th> Latitud </th><td> {{ $photo->latitud }} </td></tr><tr><th> Longitud </th><td> {{ $photo->longitud }} </td></tr><tr><th> Foto </th><td> <img src={{ $photo->photo }}> </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
@endsection
