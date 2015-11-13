@extends('layout')
@section('title','Listado de Clasificaciones')

@section ('contenido')

<h1> Listado de Clasificaciones</h1>

<ul>
    @foreach($clasificaciones as $item)
    <li> {{$item->id}} {{$item-> descripcion}}, {{$item-> fondos_id}}  {{$item->usuarios_carga_id}}

        <a href="{{url('/clasificaciones/'.$item->id.'/borrar')}}">Borrar</a> </li>
        <a href="{{url('/clasificaciones/'.$item->id.'/editarClasificacion')}}">Editar</a> </li>
    @endforeach
    
</ul>
	<a href="{{url('/altaClasificacion')}}">Cargar Clasificacion</a>
@endsection