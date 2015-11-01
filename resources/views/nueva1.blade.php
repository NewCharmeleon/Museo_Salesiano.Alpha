@extends('layout')
@section('title','Carga de Personas')

@section ('contenido')

    <h1> Carga de Personas</h1>
    
    

   <?= Former::open()->method('POST') ?>
   <?= Former::text('Nombre')->required()->min(3) ?>
   <?= Former::numeric('Cuit-Cuil')->required()->min(9) ?>
   <?= Former::numeric('Telefono')->required()->min(6) ?>
   <?= Former::text('Domicilio')->required()->min(6) ?>
   <?= Former::email('Email')->required()->min(6) ?>
   <?= Former::date('Fecha de Carga')->required()->min(9) ?>
        

  <?= Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset')
    ->url('/personas/nuevo'); ?>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<?= Former::close() ?>
@endsection