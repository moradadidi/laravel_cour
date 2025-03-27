<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Enregistrement du middleware de route avec l'alias 'age'
        $middleware->alias(['age' => \App\Http\Middleware\AgeMiddleware::class]);
        $middleware->alias(['user' => \App\Http\Middleware\UserMiddleware::class]);
        $middleware->group('test', [
            \App\Http\Middleware\AgeMiddleware::class,
            \App\Http\Middleware\UserMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
