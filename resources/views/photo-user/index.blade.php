@extends('layouts.app')

@section('content')
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Fotos</div>
                    <div class="panel-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Latitud</th><th>Longitud</th><th>Imagen</th><th>Usuario</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($photo as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->latitud }}</td><td>{{ $item->longitud }}</td><td><img src={{ $item->photo }} height="42" width="42"></td><td> {{ App\User::find($item->user_id) }}</td>
                                        <td>
                                            <a href="{{ url('/photo/' . $item->id) }}" title="Ver la foto"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $photo->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
@endsection
