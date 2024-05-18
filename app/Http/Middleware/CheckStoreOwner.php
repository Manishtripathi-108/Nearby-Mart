<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckStoreOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Check if the authenticated user is a store owner
        if (auth()->user()->isStoreOwner()) {
            return $next($request);
        }
        // If not a store owner, redirect or throw an error as needed
        return redirect()->route('home')->with('error', 'You are not authorized to access this resource.');
    }
}
