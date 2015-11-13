@extends('layout')
@section('title','Listado de Fondos')

@section ('contenido')

<h1> Listado de Fondos</h1>

<ul>
    @foreach($fondos as $item)
    <li> {{$item->id}} {{$item-> descripcion}}, {{$item-> usuario_id}}  {{$item->fecha_carga_fondo}}

        <a href="{{url('/fondos/'.$item->id.'/borrar')}}">Borrar</a> </li>
        <a href="{{url('/fondos/'.$item->id.'/editarFondo')}}">Editar</a> </li>
    @endforeach
    
</ul>
	<a href="{{url('/altaFondo')}}">Cargar Fondo</a>
@endsection