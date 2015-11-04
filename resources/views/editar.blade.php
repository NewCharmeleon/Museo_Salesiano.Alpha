@extends('layout')
@section('title','Edicion de Personas')

@section ('contenido')

<h1>Edicion de Persona: </h1>
                @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
    {!! Form::model($personas,['method' => 'PATCH', 'url' => ['/personas/editar', $personas->id]]) !!}
    @include('codigocomun.camposFormularios')
     
    <div class="form-group">
   
        {!! Form::submit('Actualizar Persona', ['class' => 'btn btn-primary form-control']) !!}
     <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    {!! Form::close() !!}
@endsection