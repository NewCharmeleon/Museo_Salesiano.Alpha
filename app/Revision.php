<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $table = 'revisiones';

     public static $rules = array(
       		'usuarios_revision_id' => 'required|exists:usuarios,id|numeric|min:3|max:50',
            'piezas_id' => 'required|exists:fondos,id|numeric|min:3|max:11',
            'estado_de_conservacion' => 'required|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/|min:1|max:11',
            'ubicacion' => 'required|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/|min:1|max:11',
    );
}
