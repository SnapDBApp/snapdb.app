<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidPaddleSignature
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->hasHeader('paddle-signature')) {
            return response('Unauthorized (no signature)', 401);
        }

        $paddleSignature = $request->header('Paddle-Signature');
        $ts = null;
        $h1 = null;

        // Use regex to get the ts and h1 values
        if (preg_match('/\bts=(\d+)\b/', $paddleSignature, $tsMatch) && preg_match('/\bh1=([\w]+)\b/', $paddleSignature, $h1Match)) {
            $ts = $tsMatch[1];
            $h1 = $h1Match[1];
        } else {
            return response('Unauthorized (invalid signature format)', 401);
        }

        // Create our own signature and hash with hmac sha256
        $ourSignature = $ts . ':' . $request->getContent();
        $ourSignature = hash_hmac('sha256', $ourSignature, config('paddle.webhook_secret_key'));

        // Compare signatures
        if($ourSignature !== $h1) {
            return response('Unauthorized (signature mismatch)', 401);
        }

        return $next($request);
    }
}
