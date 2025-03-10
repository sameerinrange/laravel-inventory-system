<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check()) {
            return redirect('login');
        }

        if ($role === 'SuperAdmin' && !auth()->user()->isSuperAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        if ($role === 'Shop' && !auth()->user()->isShop()) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
} 