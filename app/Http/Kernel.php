<?php

namespace App\Http;

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\Guest;;
use Arpon\Http\Middleware\VerifyCsrfToken;
use Arpon\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected array $middleware = [
        VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected array $middlewareGroups = [
        'web' => [
            // Add web middleware here
        ],
        'api' => [
            // Add api middleware here
        ],
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected array $routeMiddleware = [
        'auth' => Authenticate::class,
        'guest' => Guest::class,
    ];
}