@extends('layout')
@section('title','Edicion de Revisiones')

@section ('contenido')
   
<h1>Edicion de Revisiones: {{$revisiones->id}}  </h1>
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
    {!! Form::model($revisiones, ['url' => ['/revisiones/editarRevision', $revisiones->id],'method' => 'PATCH']) !!}
    @include('codigocomun.camposFormRevision')
     
    <div class="form-group">
   
        {!! Form::submit('Actualizar Revision', ['class' => 'btn btn-primary form-control']) !!}
   
    </div>
    {!! Form::close() !!}
</ul>
@endsection