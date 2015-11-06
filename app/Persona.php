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
    
 //protected $table = 'persona';



//
}
