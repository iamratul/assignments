<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // Task 3: Global Middleware
     public function handle(Request $request, Closure $next): Response
    {
        Log::info('Request: '.$request->method().' '.$request->fullUrl());
        return $next($request);
    }
}
