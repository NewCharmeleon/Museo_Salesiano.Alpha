@extends('layout')
@section('title','Edicion de Personas')

@section ('contenido')
   
<h1>Edicion de Persona: {{$personas->nombre}}  </h1>
<ul>
            @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
                @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
           
           @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
    {!! Form::model($personas, ['url' => ['/personas/editarPersona', $personas->id],'method' => 'PATCH']) !!}
    @include('codigocomun.camposFormPersona')
     
    <div class="form-group">
   
        {!! Form::submit('Actualizar Persona', ['class' => 'btn btn-primary form-control']) !!}
   
    </div>
    {!! Form::close() !!}
</ul>
@endsection