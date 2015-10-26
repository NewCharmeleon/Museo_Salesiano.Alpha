<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	//public $timestamps = false;
    public function getPersonaAtribute(){
        
        return sprintf('%s, %s ', $this->apellido, $this->nombre); 
        
    }
    
 //protected $table = 'persona';



//
}
