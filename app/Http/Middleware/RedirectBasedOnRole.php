<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) { // Periksa jika pengguna sudah login
            if (Auth::user()->role == 'admin') {
                // Arahkan admin ke dashboard
                return redirect('/admin/dashboard');
            }
            // Arahkan user biasa ke index
            return redirect('/index');
        }

        return $next($request);
    }
}
