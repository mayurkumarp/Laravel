<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectIfNotGiude
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard='guide')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/guide/login');
        }
        return $next($request);
    }
}
