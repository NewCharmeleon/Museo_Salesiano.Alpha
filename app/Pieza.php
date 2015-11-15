<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    public $timestamps = false;
    public function getPiezaAtribute(){
        
        return sprintf('%s, %s ', $this->apellido, $this->nombre); 
}
public function clasificacion()
    {
        //dd('id');
       return $this->hasOne('App\Clasificacion');
    		
    }

 public static $reglas = array (
            'descripcion' => 'required|min:3|max:100|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/',
            'clasificaciones_id' => 'required|exists:clasificaciones,id|numeric|min:3|max:50',
            'procedencia' => 'required|min:8|max:50|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/',
            'autor' => 'required|min:3|max:30|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/',
            'tema' => 'required|min:5|max:50|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/',
            'observacion' => 'required|min:3|max:50|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ0-9]+$/',
    );


//
}