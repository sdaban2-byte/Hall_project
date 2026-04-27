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
   $middleware->redirectGuestsTo(function ($request) {
    if (! $request->expectsJson()) {
        $guard = $request->segment(2) ?? 'admin'; 

        return route('view.login', ['guard' => $guard]);
    }
});
})
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

    

    