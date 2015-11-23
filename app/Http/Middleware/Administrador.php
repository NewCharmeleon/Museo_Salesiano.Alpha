<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;


class Administrador
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
    {   //dd('estoy en el handle redirect administrador');
        $this->auth=$auth;
        //this->middleware=('admin');
    }

    public function handle($request, Closure $next)
    {
        switch ($this->auth->user()->perfil_id)
        {
            case '1':
            //Administrador
                //return redirect()->to('admin');
                break;

            case '2':
            //Operador
                return redirect()->to('operador');
                break;

            default:
                return redirect()->to('login');
                break;
        }

        return $next($request);
    }
}
