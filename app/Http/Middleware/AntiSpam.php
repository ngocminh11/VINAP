<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AntiSpam
{
    public function handle(Request $request, Closure $next): Response
{
    $start = microtime(true); // ⏱ bắt đầu

    $key = sha1($request->ip() . $request->userAgent());

    RateLimiter::hit($key, 5);
    $attempts = RateLimiter::attempts($key);

    // xử lý delay
    if ($attempts > 10) {
        $delay = min(2000000, ($attempts - 10) * 150000);
        usleep($delay);
    }

    $response = $next($request);

    // ⏱ tính thời gian xử lý
    $duration = round((microtime(true) - $start) * 1000, 2);

    Log::info('REQUEST', [
        'ip'        => $request->ip(),
        'url'       => $request->path(),
        'method'    => $request->method(),
        'attempts'  => $attempts,
        'time_ms'   => $duration,
        'timestamp' => now()->toDateTimeString(),
    ]);

    return $response;
}
}