<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
   



    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';
    public static $reglas = array(
            'personas_id' => 'required|exists:personas,id|numeric|min:3|max:11',
            'perfil_id' => 'required|exists:perfil,id|numeric|min:3|max:13',
            'username' => 'required|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/|min:3|max:30',
            'email' => 'required|email|max:100',
            'password' => 'required|alpha_num|min:10|max:10',
            

    );
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
}
