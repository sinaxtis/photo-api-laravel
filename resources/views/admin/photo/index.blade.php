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
                                            <a href="{{ url('/admin/photo/' . $item->id) }}" title="Ver la foto"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/admin/photo/' . $item->id . '/edit') }}" title="Editar la foto"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/admin/photo' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Eliminar la foto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                            </form>
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
