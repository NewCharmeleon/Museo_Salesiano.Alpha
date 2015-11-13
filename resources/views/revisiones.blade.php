@extends('layout')
@section('title','Listado de Revisiones')

@section ('contenido')

<h1> Listado de Revisiones</h1>

<ul>
    @foreach($revisiones as $item)
    <li> {{$item->id}} {{$item-> usuarios_revision_id}} {{$item-> piezas_id}}  {{$item-> fecha_revision}}  {{$item->estado_de_conservacion}} {{$item->ubicacion}}

        <a href="{{url('/revisiones/'.$item->id.'/borrar')}}">Borrar</a> </li>
        <a href="{{url('/revisiones/'.$item->id.'/editarRevision')}}">Editar</a> </li>
    @endforeach
    
</ul>
	<a href="{{url('/altaRevision')}}">Cargar Revision</a>
@endsection