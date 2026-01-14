<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Umkm;
use App\Models\User;
use App\Models\Category; // Tambahkan import Model Category
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $umkm = $user->umkm;

        // --- STATISTIK UNTUK DASHBOARD ---
        $totalMenu = 0;
        if ($umkm) {
            $totalMenu = Menu::where('umkm_id', $umkm->id)->count();
        } else {
            // Jika admin, hitung total menu secara keseluruhan
            $totalMenu = Menu::count();
        }

        // --- LOGIKA GRAFIK MINGGUAN ---
        $weeklyData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $query = Menu::whereDate('created_at', $date);

            // Jika dia Owner, hanya hitung menu milik tokonya sendiri
            if ($user->role === 'owner' && $user->umkm) {
                $query->where('umkm_id', $user->umkm->id);
            }

            $weeklyData[] = $query->count();
        }

        // --- LOGIKA POPULARITAS KATEGORI (FIXED) ---
        $stats = [];

        // 1. Ambil semua kategori dari tabel categories agar dinamis
        $allCategories = Category::all();

        // 2. Hitung total menu untuk pembagi persentase
        $totalMenuQuery = Menu::query();
        if ($user->role === 'owner' && $user->umkm) {
            $totalMenuQuery->where('umkm_id', $user->umkm->id);
        }
        $totalCountForStats = $totalMenuQuery->count();

        // 3. Loop melalui kategori yang benar-benar ada di database
        foreach ($allCategories as $category) {
            // Gunakan 'category_id' sesuai nama kolom di database baru hasil migrasi
            $catQuery = Menu::where('category_id', $category->id);

            if ($user->role === 'owner' && $user->umkm) {
                $catQuery->where('umkm_id', $user->umkm->id);
            }

            $count = $catQuery->count();

            // Simpan stats menggunakan nama kategori sebagai key
            $stats[strtolower($category->nama_kategori)] = [
                'count' => $count,
                'percentage' => $totalCountForStats > 0 ? round(($count / $totalCountForStats) * 100) : 0
            ];
        }

        // Mengirimkan semua data yang dibutuhkan View
        return view('dashboard', compact('weeklyData', 'stats', 'umkm', 'totalMenu'));
    }
}
