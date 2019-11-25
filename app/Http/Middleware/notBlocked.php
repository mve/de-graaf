<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class notBlocked
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
        if (Auth::user()) {
            if (Auth::user()->active && !Auth::user()->blocked ) {
                return $next($request);
            }

        Auth::logout();

        return redirect('/blockedByAdmin') ;
        }
        return $next($request);

    }
}
