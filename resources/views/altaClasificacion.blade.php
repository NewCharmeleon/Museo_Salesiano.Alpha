@extends('layout')
@section('title','Carga de Clasificaciones')

@section ('contenido')

<h1>Carga de Clasificaciones</h1>
                @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
    {!! Form::open(['url' => '/clasificaciones/nuevo']) !!}
    @include('codigocomun.camposFormClasificacion')
    <div class="form-group">
        {!! Form::submit('Cargar', ['class' => 'btn btn-primary form-control']) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    {!! Form::close() !!}
@endsection