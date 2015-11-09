@extends('layout')
@section('title','Listado de Piezas')

@section ('contenido')

<h1> Listado de Piezas</h1>

<ul>
    @foreach($piezas as $item)
    <li> {{$item->id}} {{$item-> descripcion}}, {{$item-> clasificaciones_id}}  {{$item->procedencia}} {{$item->autor}} {{$item->fecha_ejecucion}} {{$item->tema}} {{$item->observacion}}

        <a href="{{url('/piezas/'.$item->id.'/borrar')}}">Borrar</a> </li>
        <a href="{{url('/piezas/'.$item->id.'/editarPieza')}}">Editar</a> </li>
    @endforeach
    
</ul>
	<a href="{{url('/altaPieza')}}">Cargar Pieza</a>
@endsection