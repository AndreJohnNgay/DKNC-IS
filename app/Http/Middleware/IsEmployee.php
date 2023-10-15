<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsEmployee
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'employee') {
            return $next($request);
        }

        return redirect('/')->with('error', 'Access denied: You must be an employee.');
    }
}
