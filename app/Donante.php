<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    public static $reglas = array(
       		'personas_id' => 'required|exists:personas,id|numeric|min:3|max:11',
       		           
            
    );
}
