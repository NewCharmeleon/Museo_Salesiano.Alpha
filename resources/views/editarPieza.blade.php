@extends('layout')
@section('title','Edicion de Piezas')

@section ('contenido')
   
<h1>Edicion de Pieza: {{$piezas->nombre}}  </h1>
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
    {!! Form::model($piezas, ['url' => ['/piezas/editarPieza', $piezas->id],'method' => 'PATCH']) !!}
    @include('codigocomun.camposFormPieza')
     
    <div class="form-group">
   
        {!! Form::submit('Actualizar Pieza', ['class' => 'btn btn-primary form-control']) !!}
   
    </div>
    {!! Form::close() !!}
</ul>
@endsection