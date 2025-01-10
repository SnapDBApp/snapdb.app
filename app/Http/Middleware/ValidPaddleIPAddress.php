<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidPaddleIPAddress
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! in_array($request->ip(), config('paddle.ip-whitelist'))) {
            return response('Unauthorized (blocked IP address ' . $request->ip() . ')', 401);
        }

        return $next($request);
    }
}
