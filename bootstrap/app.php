<?php

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\Guest;
use Arpon\Foundation\Application;
use Arpon\Foundation\Configuration\Exceptions;
use Arpon\Foundation\Configuration\Middleware;
use Arpon\Http\Middleware\VerifyCsrfToken;



return Application::configure(__DIR__)
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: '',
        health: '/up'
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->use([
            VerifyCsrfToken::class
        ]);
        $middleware->route([
            'auth' => Authenticate::class,
            'guest' => Guest::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
