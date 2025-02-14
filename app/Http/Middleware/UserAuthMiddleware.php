<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('customer')->check() || Auth::guard('customer')->user()->role !== 'customer') {
            return redirect()->route('show.user.login');
        }
        return $next($request);
    }
}
