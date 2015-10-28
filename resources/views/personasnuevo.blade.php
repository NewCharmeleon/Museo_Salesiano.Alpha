@extends('layout')
@section('title','Listado de Personas')

@section ('contenido')

    <h1> Carga de Personas</h1>
    <hr/>
    
   {{ Former::open('checkout') }}
{{ Former::legend('Shipping information:')}}
{{ Former::text('address_1','Address 1')->required()->min(3)}}
{{ Former::text('address_2','Address 2')}}
{{ Former::text('phone','Phone')}}
{{ Former::text('city','City')->required()->min(2)}}
{{ Former::select('state','State')->options(array('CA'=>'California'))->required()}}
{{ Former::text('zip','Zip')->required()->min(4)}}
<div class="control-group">
  <label for="payment" class="control-label">Payment*</label>
  
</div>
{{ Former::close() }}
@endsection