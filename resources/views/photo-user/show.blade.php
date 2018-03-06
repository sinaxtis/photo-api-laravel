@extends('layouts.app')

@section('content')
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Photo {{ $photo->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/photo') }}" title="Regresar"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
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
