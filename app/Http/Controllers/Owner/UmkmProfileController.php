<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmProfileController extends Controller
{
    /**
     * Menampilkan form edit profil toko
     */
    public function edit()
    {
        // Cari data UMKM berdasarkan user_id yang sedang login
        // Jika belum ada data di tabel UMKM, kita buatkan data kosong dulu agar tidak error
        $umkm = Umkm::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'nama_umkm' => 'Nama Toko Anda',
                'alamat' => 'Alamat belum diatur',
                'status_verifikasi' => 'pending',
                'is_active' => true
            ]
        );

        return view('owner.umkm.profile', compact('umkm'));
    }

    /**
     * Menyimpan perubahan data profil toko
     */
    public function update(Request $request)
    {
        $umkm = Umkm::where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'no_telp'   => 'nullable|string|max:15',
            'alamat'    => 'required|string',
            'deskripsi' => 'nullable|string',
            'jam_buka'  => 'nullable',
            'jam_tutup' => 'nullable',
        ]);

        $umkm->update([
            'nama_umkm' => $request->nama_umkm,
            'no_telp'   => $request->no_telp,
            'alamat'    => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'jam_buka'  => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
        ]);

        return back()->with('success', 'Profil toko berhasil diperbarui!');
    }
}
