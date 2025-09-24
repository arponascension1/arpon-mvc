<?php

namespace App\Http\Middleware;

use Closure;
use Arpon\Http\Request;
use Arpon\Support\Facades\Auth;

class Guest
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard()->check()) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
