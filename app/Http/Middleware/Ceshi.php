<?php

namespace App\Http\Middleware;
use Illuminate\support\Facades\Auth;
use Closure;

class Ceshi
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
        if(!Auth::check()){
            return redirect('zhoukao/login');
        }
        return $next($request);
    }
}
