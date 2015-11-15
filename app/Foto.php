<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
     public static $rules = array(
       		'piezas_id' => 'required|exists:piezas,id|numeric|min:3|max:11',
            'fotos_id' => 'required|exists:fotos,id|numeric|min:3|max:11',
            
    );
}
