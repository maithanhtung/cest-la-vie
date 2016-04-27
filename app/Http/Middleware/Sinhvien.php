<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Sinhvien
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   public function handle($request, Closure $next, $guard = 'sinhvien')
    {
        if (!Auth::guard($guard)->check()) {
        return redirect('/sinhvien/login');
        }

        return $next($request);
    }
}
