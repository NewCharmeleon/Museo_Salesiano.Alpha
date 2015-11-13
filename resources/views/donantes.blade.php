@extends('layout')
@section('title','Listado de Donantes')

@section ('contenido')

<h1> Listado de Donantes</h1>

<ul>
    @foreach($donantes as $item)
    <li> {{$item->id}} {{$item-> personas_id}} {{$item-> fecha_carga}} 

        <a href="{{url('/donantes/'.$item->id.'/borrar')}}">Borrar</a> </li>
        <a href="{{url('/donantes/'.$item->id.'/editarRevision')}}">Editar</a> </li>
    @endforeach
    
</ul>
	<a href="{{url('/altaDonante')}}">Cargar Donante</a>
@endsection