@extends('layout')
@section('title','Edicion de Fotos')

@section ('contenido')
   
<h1>Edicion de Fotos: {{$fotos->id}}  </h1>
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
    {!! Form::model($fotos, ['url' => ['/fotos/editarFoto', $fotos->id],'method' => 'PATCH']) !!}
    @include('codigocomun.camposFormFoto')
     
    <div class="form-group">
   
        {!! Form::submit('Actualizar Foto', ['class' => 'btn btn-primary form-control']) !!}
   
    </div>
    {!! Form::close() !!}
</ul>
@endsection