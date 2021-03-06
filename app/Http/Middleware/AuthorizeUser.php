<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AuthorizeUser
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
        if ( !$request->user()->authorizeRoles(['user']) )
        {
            Auth::logout();
            return redirect('/login'); // redirect to home page.
        }
        return $next($request);
    }
}