<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (auth()->user()->role !== $role) {
            abort(403, 'Unauthorized');
        }
        // if (!Auth::check() || !Auth::user()->isInstructor()) {
        //     abort(403, 'Akses ditolak. Hanya instruktur yang dapat mengakses halaman ini.');
        // }
        return $next($request);
    }
}
