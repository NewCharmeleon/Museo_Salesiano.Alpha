<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public static $reglas = array(
       		'personas_id' => 'required|exists:personas,id|numeric|min:3|max:11',
       		'perfil_id' => 'required|exists:perfil,id|numeric|min:3|max:13',
            'username' => 'required|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/|min:3|max:30',
            'email' => 'required|email|max:100',
            'password' => 'required|alpha_num|min:10|max:10',
            

    );
}
