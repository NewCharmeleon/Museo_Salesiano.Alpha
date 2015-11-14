@extends('layout')
@section('title','Edicion de Donantes')

@section ('contenido')
   
<h1>Edicion de Donantes: {{$donantes->id}}  </h1>
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
    {!! Form::model($donantes, ['url' => ['/donantes/editarDonante', $donantes->id],'method' => 'PATCH']) !!}
    @include('codigocomun.camposFormDonante')
     
    <div class="form-group">
   
        {!! Form::submit('Actualizar Donante', ['class' => 'btn btn-primary form-control']) !!}
   
    </div>
    {!! Form::close() !!}
</ul>
@endsection