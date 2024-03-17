<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && Auth::id() == 1) {
                return redirect('/home');
            } else if ((Auth::guard($guard)->check() && Auth::id() != 1)) {
                return redirect('/browse-menu');
            }
        }
        return $next($request);
    }
}