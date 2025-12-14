<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Dies ist der entscheidende Teil, den Sie HINZUFÜGEN müssen:
        $middleware->validateCsrfTokens(except: [
            'login',
            'logout'
        ]);

        // Alternativ könnten Sie auch hier eine Route eintragen, falls Sie eine API nutzen:
        // 'api/login',
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
