<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (!in_array(Auth::user()->role, $roles)) {
            // Arahkan ke dashboard sesuai role mereka masing-masing
            $role = Auth::user()->role;
            if ($role === 'warga') return redirect('/warga/dashboard');
            if ($role === 'staff') return redirect('/staff/dashboard');
            if ($role === 'kades') return redirect('/kades/dashboard');
        }

        return $next($request);
    }
}