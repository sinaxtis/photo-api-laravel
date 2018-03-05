@extends('layouts.app')

@section('content')
<div class="col-md-10">
    <div class="panel panel-primary">
        <div class="panel-body">


            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Hay un problema con la imagen.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                <img src="/images/{{ Session::get('path') }}">
            @endif


            <form action="{{ url('image-upload') }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <input type="file" name="image" />
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Subir</button>
                    </div>
                </div>
            </form>


        </div>
    </div>


</div>
@endsection


