<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
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
        if(env('APP_ENV') == 'production') {
            return $next($request)
                ->header('Access-Control-Allow-Origin', env('APP_URL'))
                ->header('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Authorization, Origin')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        } else {
            return $next($request)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Authorization, Origin')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        }
    }
}