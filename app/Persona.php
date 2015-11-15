<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	protected $fillable = [
        'nombre',
        'cuit_cuil',
        'telefono',
        'domicilio',
        'email'
        
    ];

    //public $timestamps = false;
    public function getPersonaAtribute(){
        
        return sprintf('%s, %s ', $this->apellido, $this->nombre); 
        
    }
    
 
     public static $reglas = array (
            'nombre' => 'required|min:3|max:30|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/',
            'cuit_cuil' => 'required|numeric|digits_between:9,13',
            'telefono' => 'required|numeric|min:6|digits_between:7,25',
            'domicilio' => 'required|min:6|max:50|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/',
            'email' => 'required|unique:personas,email|email|min:6',
    );


//
}
