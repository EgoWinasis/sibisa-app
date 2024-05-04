<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaliAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('wali')->check()) {
            return redirect()->route('login.wali');
        }

        return $next($request);
    }
}
