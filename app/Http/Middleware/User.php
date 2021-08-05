<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class User extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = config( 'auth.guards' );
        foreach ($guards as $guard => $guard_arr){
            if (Auth::guard($guard)->check()){
                Auth::shouldUse($guard);
            }
        }

        if (!Auth::check()){
            return redirect(route('login'));
        }

        return $next($request);
    }
}
