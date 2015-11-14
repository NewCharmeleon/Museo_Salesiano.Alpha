<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    protected $table = 'clasificaciones';

    public static $rules = array(
        'nombreyapellido' => 'required|between:6,100|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/',
        'username' => 'required|between:3,20|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/',
        'password' => 'required|between:2,100|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/',
        'perfil' => 'required|between:6,100|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/'
    );
}
