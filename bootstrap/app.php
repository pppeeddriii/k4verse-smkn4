<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\TokenMismatchException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware): void {
        //
    })

    ->withExceptions(function (Exceptions $exceptions): void {

        $exceptions->render(function (TokenMismatchException $e, $request) {

            // Kalau session admin sudah expired
            if ($request->is('admin/*')) {
                return redirect()
                    ->route('admin.login')
                    ->with('error', 'Sesi telah berakhir. Silakan login kembali.');
            }

            return redirect()
                ->back()
                ->with('error', 'Halaman telah kedaluwarsa. Silakan coba lagi.');
        });

    })

    ->create();