<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class IsActive extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not active.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->is_active == false) {
            Auth::logout();
        }
        return $next($request);
    }
}
