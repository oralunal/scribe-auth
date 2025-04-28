<?php

namespace oralunal\ScribeAuth\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ScribeAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $docsType = config('scribe.type', 'laravel');

        if (Str::endsWith($docsType, 'laravel') && config('scribe.laravel.add_routes', true) && config('scribe_auth.enabled') && ! $request->session()->has('scribe_authenticated')) {
            return redirect()->route('scribe_auth.login');
        }

        return $next($request);
    }
}
