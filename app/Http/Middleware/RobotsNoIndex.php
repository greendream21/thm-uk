<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class RobotsNoIndex
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
        if (App::environment('production') || App::runningInConsole()) {
            return $next($request);
        }

        return $next($request)->header('X-Robots-Tag', 'noindex');
    }
}
