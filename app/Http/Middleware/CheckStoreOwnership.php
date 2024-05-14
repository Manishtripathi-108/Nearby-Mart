<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Store;

class CheckStoreOwnership
{
    // Handle an incoming request.
    public function handle(Request $request, Closure $next): Response
    {
        $store = $request->route('store');
        $storeExists = Store::find($store->id);

        // Check if the store exists and belongs to the authenticated user
        if (!$storeExists || $store->user_id !== auth()->id()) {
            return redirect()->route('store.index')->with('error', 'You do not have permission to access this store.');
        }

        return $next($request);
    }
}
