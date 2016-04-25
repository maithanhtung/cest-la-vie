<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Quanly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   public function handle($request, Closure $next, $guard = 'quanly')
    {
        if (!Auth::guard($guard)->check()) {
        return redirect('/quanly/login');
        }

        return $next($request);
    }
}
