@extends('layout')
@section('title','Listado de Donaciones')

@section ('contenido')

<h1> Listado de Donaciones</h1>

<ul>
    @foreach($donaciones as $item)
    <li> {{$item->id}} {{$item-> donantes_id}}, {{$item-> piezas_id}}

        <a href="{{url('/donaciones/'.$item->id.'/borrar')}}">Borrar</a> </li>
        <a href="{{url('/donaciones/'.$item->id.'/editarDonacion')}}">Editar</a> </li>
    @endforeach
    
</ul>
	<a href="{{url('/altaDonacion')}}">Cargar Donacion</a>
@endsection