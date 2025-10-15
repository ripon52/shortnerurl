<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })

    ->withExceptions(function ($exceptions) {

        $exceptions->render(function (Throwable $e, Request $request) {

            // Force JSON for all API requests
            if (!($request->expectsJson() || $request->is('api/*'))) {
                return null; // Let Laravel handle web requests normally
            }

            // Handle 404 from ModelNotFound or Route not found
            if ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException) {
                return response()->json([
                    'status' => false,
                    'code' => 404,
                    'message' => 'Resource not found',
                    'data' => [],
                    'error' => [
                        'type' => class_basename($e),
                        'file' => $e->getFile(),
                        'line' => $e->getLine(),
                    ],
                ], 404);
            }

            // Handle generic HTTP exceptions
            if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface) {
                return response()->json([
                    'status' => false,
                    'code' => $e->getStatusCode(),
                    'message' => $e->getMessage() ?: 'HTTP error occurred',
                    'data' => [],
                    'error' => [
                        'type' => class_basename($e),
                    ],
                ], $e->getStatusCode());
            }

            // fallback (other uncaught exceptions)
            return response()->json([
                'status' => false,
                'code' => 500,
                'message' => 'Server Error | '.$e->getMessage(),
                'data' => [],
                'error' => [
                    'type' => class_basename($e),
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile(),
                ],
            ], 500);
        });
    })
    ->create();
