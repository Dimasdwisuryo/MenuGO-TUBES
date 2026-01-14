<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Umkm;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 1. Membuat User Baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'owner',
            'status' => 'pending',
        ]);

        // 2. Membuat Data UMKM Otomatis (Relasi One-to-One)
        Umkm::create([
            'user_id' => $user->id,
            'nama_umkm' => 'Toko ' . $user->name,
            'alamat' => 'Alamat belum diisi',
            'status_verifikasi' => 'pending',
            'is_open' => true,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // --- TAMBAHAN LOGIKA UNTUK MENCEGAH AKSES PENDING ---
        if ($user->status === 'pending') {
            Auth::logout(); // Putus sesi login otomatis agar tidak bisa masuk dashboard
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Arahkan ke rute pending notice yang sudah kita buat sebelumnya di web.php
            return redirect()->route('pending.notice')->with('success', 'Registrasi berhasil! Akun Anda sedang dalam proses verifikasi admin.');
        }

        // 3. Dialihkan ke Dashboard (Breeze akan otomatis cek role lewat Middleware)
        return redirect(RouteServiceProvider::HOME);
    }
}
