<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Owner\MenuController;
// TAMBAHKAN IMPORT INI
use App\Http\Controllers\Owner\UmkmProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;
use App\Models\Umkm;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Halaman Utama Public
|--------------------------------------------------------------------------
*/
Route::get('/', function (Request $request) {
    $categoryId = $request->query('category');
    $menusQuery = Menu::with('category', 'umkm');

    if ($categoryId) {
        $menusQuery->where('category_id', $categoryId);
    }

    $menus = $menusQuery->latest()->take(8)->get();
    $umkms = Umkm::where('status_verifikasi', 'approved')->latest()->take(3)->get();
    $categories = Category::all();

    return view('welcome', compact('menus', 'umkms', 'categories'));
});

/*
|--------------------------------------------------------------------------
| LOGIKA VERIFIKASI PENDING
|--------------------------------------------------------------------------
*/
// Rute untuk menangkap user yang kena usir middleware karena status pending
Route::get('/pending-notice', function () {
    return view('auth.pending');
})->middleware(['auth'])->name('pending.notice');

/*
|--------------------------------------------------------------------------
| DASHBOARD (ALL AUTH USERS)
|--------------------------------------------------------------------------
*/
// Tambahkan middleware 'check.status' agar user pending tidak bisa masuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'check.status'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Rute Profil Standar (Agar Dropdown Atas Tidak Error)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ADMIN_MENUGO ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin_menugo'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/verifikasi', [\App\Http\Controllers\Admin\UmkmVerificationController::class, 'index'])->name('verifikasi.index');
    Route::post('/verifikasi/{umkm}/approve', [\App\Http\Controllers\Admin\UmkmVerificationController::class, 'approve'])->name('verifikasi.approve');
    Route::post('/verifikasi/{umkm}/reject', [\App\Http\Controllers\Admin\UmkmVerificationController::class, 'reject'])->name('verifikasi.reject');
});

/*
|--------------------------------------------------------------------------
| OWNER ROUTES (UMKM)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:owner', 'check.status'])->prefix('owner')->name('owner.')->group(function () {
    // Rute Profil khusus User Owner (Profil Pribadi)
    Route::get('/profile-user', [ProfileController::class, 'edit'])->name('profile.edit');

    // Rute Profil UMKM (Fitur Profil Toko) - URL: /owner/profile
    Route::get('/profile', [UmkmProfileController::class, 'edit'])->name('umkm.profile');
    Route::put('/profile', [UmkmProfileController::class, 'update'])->name('umkm.profile.update');

    // Rute CRUD (Fitur Manajemen Menu)
    Route::resource('menu', MenuController::class);
});

require __DIR__ . '/auth.php';
