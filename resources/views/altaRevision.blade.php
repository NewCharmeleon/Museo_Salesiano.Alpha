@extends('layout')
@section('title','Carga de Revisiones')

@section ('contenido')

<h1>Carga de Revisiones</h1>
                @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
    {!! Form::open(['url' => '/revisiones/nuevo']) !!}
    @include('codigocomun.camposFormRevision')
    <div class="form-group">
        {!! Form::submit('Cargar', ['class' => 'btn btn-primary form-control']) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    {!! Form::close() !!}
@endsection