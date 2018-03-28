<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AuthorizeAdmin
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
        if ( !$request->user()->authorizeRoles(['admin']) )
        {
            Auth::logout();
            return redirect('/login'); // redirect to home page.
        }
        return $next($request);
    }
}
