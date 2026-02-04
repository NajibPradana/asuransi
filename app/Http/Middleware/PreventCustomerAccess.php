<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class PreventCustomerAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check()) {
            /** @var User $user */
            $user = Auth::guard('admin')->user();

            // Check if user only has 'user' role (no other roles)
            if ($user->hasRole('user') && $user->roles->count() === 1) {
                // abort(403, 'Access denied. Customers are not allowed to access the admin panel.');
                abort(404);
            }
        }

        return $next($request);
    }
}
