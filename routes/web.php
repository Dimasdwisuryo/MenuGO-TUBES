<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route khusus ADMIN MenuGO
Route::middleware(['auth', 'role:admin_menugo'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return "Halo Admin MenuGO! Kamu punya akses penuh.";
    })->name('admin.dashboard');
});

// Route khusus OWNER UMKM
Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::get('/owner/dashboard', function () {
        return "Halo Pemilik UMKM! Selamat mengelola toko Anda.";
    })->name('owner.dashboard');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
