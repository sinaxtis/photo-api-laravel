@extends('layouts.app')

@section('content')
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar fotos #{{ $photo->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/photo') }}" title="Regresar"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/photo/' . $photo->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.photo.form', ['submitButtonText' => 'Actualizar'])

                        </form>

                    </div>
                </div>
            </div>
@endsection
