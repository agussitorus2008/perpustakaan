<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Check if the user is authenticated and not an admin
        if (auth()->check() && !auth()->user()->is_admin) {
            return $next($request);
        }

        // If the user is an admin or not logged in, redirect to login
        return redirect('auth/login')->with('error', 'Unauthorized access. Please log in as a regular user.');
    }
}
