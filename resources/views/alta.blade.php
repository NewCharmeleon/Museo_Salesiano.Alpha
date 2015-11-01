@extends('layout')
@section('title','Carga de Personas')

@section ('contenido')

<h1>Carga de Personas</h1>
                @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
    {!! Form::open(['url' => '/personas/nuevo']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('cuit_cuil', 'Cuit/Cuil:') !!}
        {!! Form::text('cuit_cuil',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::text('telefono',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('domicilio', 'Domicilio:') !!}
        {!! Form::text('domicilio',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>
     <div class="form-group">
        {!! Form::label('fecha_carga', 'Fecha de Carga:') !!}
        {!! Form::text('fecha_carga',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Cargar', ['class' => 'btn btn-primary form-control']) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    {!! Form::close() !!}
@endsection