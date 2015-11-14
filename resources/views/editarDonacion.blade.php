@extends('layout')
@section('title','Edicion de Donaciones')

@section ('contenido')
   
<h1>Edicion de Donaciones: {{$donaciones->id}}  </h1>
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
    {!! Form::model($donaciones, ['url' => ['/donaciones/editarDonacion', $donaciones->id],'method' => 'PATCH']) !!}
    @include('codigocomun.camposFormDonacion')
     
    <div class="form-group">
   
        {!! Form::submit('Actualizar Donacion', ['class' => 'btn btn-primary form-control']) !!}
   
    </div>
    {!! Form::close() !!}
</ul>
@endsection