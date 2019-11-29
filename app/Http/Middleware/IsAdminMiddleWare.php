<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleWare
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
        //Kijkt of de huidige gebruiker een beheerder is
        if (Auth::user() &&  Auth::user()->isadmin == 2) {
            return $next($request);
        }
        return redirect('/') ;
    }
}
