<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {//dd('estoy en el redirect');
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {//dd('estoy en el handle redirect');
        if ($this->auth->check()) {


            switch ($this->auth->user()->perfil_id)
        {
            case '1':
            //Administrador
           // dd('estoy en el redirect');
                return redirect()->to('admin');
                break;

            case '2':
            //Operador
            //dd('estoy en el login op');
                return redirect()->to('operador');
                break;

            default:
                //dd('estoy en el login redirect');
                return redirect()->to('login');
                break;
        }


            return redirect('/bienvenido');
        }

        return $next($request);
    }
}
