<?php

namespace App\Http\Middleware;

use Closure;
use app\User;
use Illuminate\Contracts\Auth\Guard;

class Admin
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = 'auth';
    }

    public function handle($request, Closure $next)
    {
        if($this->auth->user()->admin())
        {
            return $next($request);
        }
        else
        {
            dd("acceso denegado");
        }

        
    }
}
