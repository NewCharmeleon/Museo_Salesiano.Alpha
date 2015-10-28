@extends('layout')
@section('title','Listado de Personas')

@section ('contenido')

<h1> Listado de Personas</h1>

<ul>
    <?= Former::open()->method('GET') ?>
    <?= Former::text('name')->required() ?>
	<?= Former::close() ?>
      <a href="{{url('/personas/'.$item->id.'/borrar')}}">Borrar</a> </li>
   
    
</ul>
@endsection
