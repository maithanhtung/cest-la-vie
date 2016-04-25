<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Giaovien
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   public function handle($request, Closure $next, $guard = 'giaovien')
    {
        if (!Auth::guard($guard)->check()) {
        return redirect('/giaovien/login');
        }

        return $next($request);
    }
}
