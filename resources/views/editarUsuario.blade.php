@extends('layout')
@section('title','Edicion de Usuarios')

@section ('contenido')
   
<h1>Edicion de Usuario: {{$usuarios->nombre_usuario}}  </h1>
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
    {!! Form::model($usuarios, ['url' => ['/usuarios/editarUsuario', $usuarios->id],'method' => 'PATCH']) !!}
    @include('codigocomun.camposFormUsuario')
     
    <div class="form-group">
   
        {!! Form::submit('Actualizar Usuario', ['class' => 'btn btn-primary form-control']) !!}
   
    </div>
    {!! Form::close() !!}
</ul>
@endsection