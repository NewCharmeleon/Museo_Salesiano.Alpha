<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    public static $rules = array(
       		'personas_id' => 'required|exists:personas,id|numeric|min:3|max:11',
       		           
            
    );
}
