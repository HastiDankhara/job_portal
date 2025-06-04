<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has the 'admin' role
        // dd($request->user());
        if ($request->user() == null) {
            // If the user is not authenticated, redirect to the login page
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }
        if ($request->user()->role != 'admin') {
            // If not, redirect to the home page or any other page
            return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
        }
        return $next($request);
    }
}
