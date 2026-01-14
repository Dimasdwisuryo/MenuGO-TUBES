<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    public function handle(Request $request, Closure $next)
{
    if (Auth::check() && Auth::user()->status === 'pending') {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('error', 'Akun Anda sedang ditinjau. Mohon tunggu verifikasi admin.');
    }
    return $next($request);
}
}
