<?php
namespace App\Http\Middleware;
use Closure;
class RedirectIfNotNurse
{
    /*
     _ Handle an incoming request.
     _
     _ @param  \Illuminate\Http\Request  $request
     _ @param  \Closure  $next
     _ @return mixed
     */
    public function handle($request, Closure $next, $guard="nurse")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect(route('nurse.login'));
        }
        return $next($request);
    }
}