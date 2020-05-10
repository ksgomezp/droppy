<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=Auth::user();
        if(!$user->IsAdmin())
        {
            echo "eres cliente";
            return redirect()->route('home.index');

        }
        else
        {
            echo "eres administrador";
            //return redirect()->route('admin.users.index');
            return redirect('/');

        }
        return $next($request);
    }
}
