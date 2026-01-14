<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Cek apakah user sudah login
        // 2. Cek apakah role user sesuai dengan role yang diminta di route
        if (!$request->user() || $request->user()->role !== $role) {

            // Jika user adalah owner tapi coba akses halaman admin, lempar ke dashboard owner
            if ($request->user()->role === 'owner') {
                return redirect()->route('owner.dashboard');
            }

            // Jika user adalah admin tapi coba akses halaman owner, lempar ke dashboard admin
            if ($request->user()->role === 'admin_menugo') {
                return redirect()->route('admin.dashboard');
            }

            // Jika tidak jelas, lempar ke halaman utama
            return redirect('/');
        }

        return $next($request);
    }
}
