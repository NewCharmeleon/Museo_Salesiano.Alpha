@extends('layout')
@section('title','Edicion de Clasificaciones')

@section ('contenido')
   
<h1>Edicion de Clasificaciones: {{$clasificaciones->descripcion}}  </h1>
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
    {!! Form::model($clasificaciones, ['url' => ['/clasificaciones/editarClasificacion', $clasificaciones->id],'method' => 'PATCH']) !!}
    @include('codigocomun.camposFormClasificacion')
     
    <div class="form-group">
   
        {!! Form::submit('Actualizar Clasificacion', ['class' => 'btn btn-primary form-control']) !!}
   
    </div>
    {!! Form::close() !!}
</ul>
@endsection