<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    protected $table = 'clasificaciones';

    public static $rules = array(
       		 'descripcion' => 'required|numeric|min:3|max:50',
            'fondos_id' => 'required|exists:fondos,id|numeric|min:3|max:11',
            'usuarios_carga_id' => 'required|exists:usuarios_carga,id|numeric|min:1|max:11',
    );
}
