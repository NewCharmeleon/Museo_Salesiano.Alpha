@extends('layout')
@section('title','Edicion de Fondos')

@section ('contenido')
   
<h1>Edicion de Fondos: {{$fondos->descripcion}}  </h1>
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
    {!! Form::model($fondos, ['url' => ['/fondos/editarFondo', $fondos->id],'method' => 'PATCH']) !!}
    @include('codigocomun.camposFormFondo')
     
    <div class="form-group">
   
        {!! Form::submit('Actualizar Fondo', ['class' => 'btn btn-primary form-control']) !!}
   
    </div>
    {!! Form::close() !!}
</ul>
@endsection