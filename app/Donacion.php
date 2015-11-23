<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    protected $table = 'donaciones';

     public static $reglas = array(
       		'donantes_id' => 'required|exists:donantes,id|numeric|min:3|max:11',
       		'piezas_id' => 'required|exists:piezas,id|numeric|min:3|max:11',
            
            
    );
}
