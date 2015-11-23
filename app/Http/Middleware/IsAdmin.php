<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;


class IsAdmin
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
    {   dd('estoy en el handle redirect administrador');
        $this->auth=$auth;
        //this->middleware=('admin');
    }

public function handle($request, Closure $next)
    {
        if ( !$this->auth->user()->role === 'admin' )
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->to('home');
            }
        }

        return $next($request);
    }
