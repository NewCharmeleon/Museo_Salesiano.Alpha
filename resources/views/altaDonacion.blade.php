@extends('layout')
@section('title','Carga de Donaciones')

@section ('contenido')

<h1>Carga de Donaciones</h1>
                @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
    {!! Form::open(['url' => '/donaciones/nuevo']) !!}
    @include('codigocomun.camposFormDonacion')
    <div class="form-group">
        {!! Form::submit('Cargar', ['class' => 'btn btn-primary form-control']) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    {!! Form::close() !!}
@endsection