<?php
namespace App\Http\Middleware;
use Closure;
class RedirectIfNotPhysician
{
    /*
     _ Handle an incoming request.
     _
     _ @param  \Illuminate\Http\Request  $request
     _ @param  \Closure  $next
     _ @return mixed
     */
    public function handle($request, Closure $next, $guard="physician")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect(route('physician.login'));
        }
        return $next($request);
    }
}