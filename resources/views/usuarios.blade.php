@extends('layout')
@section('title','Listado de Usuarios')

@section ('contenido')

<h1> Listado de Usuarios</h1>

<ul>
    @foreach($usuarios as $item)
    <li> {{$item->id}} {{$item-> personas_id}}, {{$item-> nombre_usuario}}  {{$item-> perfil_usuario}}

        <a href="{{url('/usuarios/'.$item->id.'/borrar')}}">Borrar</a> </li>
        <a href="{{url('/usuarios/'.$item->id.'/editarUsuario')}}">Editar</a> </li>
    @endforeach
    
</ul>
	<a href="{{url('/altaUsuario')}}">Cargar Usuario</a>
@endsection