@extends('layout')
@section('title','Listado de Fotos')

@section ('contenido')

<h1> Listado de Fotos</h1>

<ul>
    @foreach($fotos as $item)
    <li> {{$item->id}} {{$item-> piezas_id}} {{$item-> fotos_id}}  

        <a href="{{url('/fotos/'.$item->id.'/borrar')}}">Borrar</a> </li>
        <a href="{{url('/fotos/'.$item->id.'/editarFoto')}}">Editar</a> </li>
    @endforeach
    
</ul>
	<a href="{{url('/altaFoto')}}">Cargar Foto</a>
@endsection