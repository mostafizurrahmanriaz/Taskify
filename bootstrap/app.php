<?php

use App\Http\Middleware\EnsureProviderSetup;
use App\Http\Middleware\ProviderMiddleware;
use App\Http\Middleware\CheckProviderSetup;
use App\Http\Middleware\EnsureLogin;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'provider' => ProviderMiddleware::class,
            'provider.setup' => EnsureProviderSetup::class,
            'provider.check' => CheckProviderSetup::class,
            'check.auth' => EnsureLogin::class,
            'valid.role' => RoleMiddleware::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
