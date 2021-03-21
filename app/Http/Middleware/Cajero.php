<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Illuminate\Contracts\Auth\Guard;

class Cajero
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
    {
        $this->auth = $auth;
    }
    public function handle(Request $request, Closure $next)
    {
        switch ($this-> auth->user()->is_admin){
            case '1':
                #AdminMiddleware
                return redirect()->to('dashboard');
                break;
            case '2':
                #Empleado
                return redirect()->to('dashboard');
                break;
            case '3':
                #Cajero
                //return redirect()->to('mostrar');
                break;
            default:
                return redirect()->to('login');
        }
        return $next($request);
    }
}
