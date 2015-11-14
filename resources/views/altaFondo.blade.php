@extends('layout')
@section('title','Carga de Fondos')

@section ('contenido')

<h1>Carga de Fondos</h1>
                @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
    {!! Form::open(['url' => '/fondos/nuevo']) !!}
    @include('codigocomun.camposFormFondo')
    <div class="form-group">
        {!! Form::submit('Cargar', ['class' => 'btn btn-primary form-control']) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    {!! Form::close() !!}
@endsection