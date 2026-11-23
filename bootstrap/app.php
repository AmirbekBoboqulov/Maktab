<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use \App\Http\Middleware\Language;

$appKey = $_ENV['APP_KEY'] ?? getenv('APP_KEY');
if ($appKey && !str_starts_with($appKey, 'base64:')) {
    $decodedKey = base64_decode($appKey, true);
    if ($decodedKey === false || !in_array(strlen($decodedKey), [16, 32], true)) {
        $normalizedKey = 'base64:' . base64_encode(hash('sha256', $appKey, true));
        putenv('APP_KEY=' . $normalizedKey);
        $_ENV['APP_KEY'] = $normalizedKey;
        $_SERVER['APP_KEY'] = $normalizedKey;
    }
}

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [Language::class]);
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
