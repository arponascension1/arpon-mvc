<?php

namespace App\Http\Middleware;

use Closure;
use Arpon\Support\Facades\Auth;
use Arpon\Support\Facades\Redirect;

class Guest
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return Redirect::to('/profile');
        }

        return $next($request);
    }
}