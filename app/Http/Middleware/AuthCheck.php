<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthCheck
{

    protected $auth;
    protected $response;



    public function handle(Request $request, Closure $next)
    {
        $authUser = (Auth::check());
        if (! $authUser)
            return redirect('auth/login');
        return $next($request);

    }
}
