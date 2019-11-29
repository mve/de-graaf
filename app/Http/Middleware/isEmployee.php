<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Kijkt of gebruiker ingelogd is en of hij een werknemer og hoger is. isadmin = 1 staat gelijk aan werknemer, isadmin =2 staat gelijk aan beheerder
        if (Auth::user() && Auth::user()->isadmin >= 1) {
            return $next($request);
        }
        return redirect('/');
    }
}
