<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class Operador
{
   /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $auth;

    public function __construct(Guard $auth)
    {//dd('hola');
        $this->auth=$auth;
    }

    public function handle($request, Closure $next)
    {//dd('estoy en el handle redirect operadorrrr');
        switch ($this->auth->user()->perfil_id)
        {
            case '1':
            //Administrador
           // dd('hola');
                return redirect()->to('administrador');
                break;

            case '2':
            //Operador
            //dd('hola ope');
                //return redirect()->to('operador');
                break;

            default:
           // dd('hola');
                return redirect()->to('login');
                break;
        }

        return $next($request);
    }
}
