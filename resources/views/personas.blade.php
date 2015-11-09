@extends('layout')
@section('title','Listado de Personas')

@section ('contenido')

<h1> Listado de Personas</h1>

<ul>
    @foreach($personas as $item)
    <li> {{$item->id}} {{$item-> nombre}}, {{$item-> cuit_cuil}}  {{$item->telefono}} {{$item->domicilio}} {{$item->email}} {{$item->fecha_carga_persona}}

        <a href="{{url('/personas/'.$item->id.'/borrar')}}">Borrar</a> </li>
        <a href="{{url('/personas/'.$item->id.'/editarPersona')}}">Editar</a> </li>
    @endforeach
    	
</ul>
	<a href="{{url('/altaPersona')}}">Cargar Persona</a>
@endsection