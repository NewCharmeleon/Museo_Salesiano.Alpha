<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fondo extends Model
{
    public static $reglas = array(
       		'descripcion' => 'required|min:3|max:50|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/',
       		'usuarios_id' => 'required|exists:usuarios,id|numeric|min:3|max:11',
            
            
    );
}
