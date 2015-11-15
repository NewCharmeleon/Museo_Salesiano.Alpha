<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public static $rules = array(
       		'personas_id' => 'required|exists:personas,id|numeric|min:3|max:11',
            'nombre_usuario' => 'required|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/|min:3|max:30',
            'password' => 'required|alpha_num|min:10|max:10',
            'perfil_usuario' => 'required|alpha|min:8|max:13',

    );
}
