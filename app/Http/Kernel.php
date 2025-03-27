<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Http\Middleware\
{
    TrustProxies,
    HandleCors,
    PreventRequestsDuringMaintenance,
    ValidatePostSize,
    TrimStrings,
    ConvertEmptyStringsToNull,
    Authenticate,
    RedirectIfAuthenticated,
    VerifyCsrfToken
};

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        TrustProxies::class,
        HandleCors::class,
        // PreventRequestsDuringMaintenance::class,
        // ValidatePostSize::class,
        // TrimStrings::class,
        // ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            // VerifyCsrfToken::class,
            // TrimStrings::class,
            // ConvertEmptyStringsToNull::class,
        ],

        'api' => [
            'throttle:api',
            // TrimStrings::class,
            // ConvertEmptyStringsToNull::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        // 'auth' => Authenticate::class,
        // 'guest' => RedirectIfAuthenticated::class,
        'age' => \App\Http\Middleware\AgeMiddleware::class,
        'user' => \App\Http\Middleware\UserMiddleware::class,
    ];
}
