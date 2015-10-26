<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    public $timestamps = false;
    public function getPiezaAtribute(){
        
        return sprintf('%s, %s ', $this->apellido, $this->nombre); 
}
//protected $table = 'persona';



//
}