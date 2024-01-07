<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Check if the authenticated user is an admin
            if (auth()->user()->is_admin) {
                return $next($request);
            }
        }

        // If not an admin or not logged in, redirect to login
        return redirect('auth/login')->with('error', 'Unauthorized access. Please log in as an admin.');
    }
}
