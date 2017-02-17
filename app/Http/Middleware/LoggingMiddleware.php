<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Logging\Log;

class LoggingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Log::info($request->getMethod().' request on URL '.$request->fullUrl());
        return $next($request);
    }
}
