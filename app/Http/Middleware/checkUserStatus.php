<?php

namespace App\Http\Middleware;

use Closure;
use Cart;
class checkUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
       
       if(auth()->check())
       {
            $guard = is_null($guard) ? 'web' : $guard;

            if(auth()->guard($guard)->user()->active == 0){
               
                auth()->guard($guard)->logout();
                Cart::destroy();
                return redirect()->route('login')->withError('Your account has been deactivated by admin.');
            }

            if(auth()->guard($guard)->user()->delete == 1){
               
                auth()->guard($guard)->logout();
                Cart::destroy();
                return redirect()->route('login')->withError('Your account has been removed.');
            }
       }
        
       return $next($request);
    }
}
