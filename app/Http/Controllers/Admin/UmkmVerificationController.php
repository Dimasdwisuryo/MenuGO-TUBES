<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmVerificationController extends Controller
{
    public function index()
    {
        // Mengambil UMKM yang statusnya masih pending
        $pendingUmkms = Umkm::where('status_verifikasi', 'pending')->get();
        // Mengambil UMKM yang sudah diverifikasi (opsional untuk history)
        $verifiedUmkms = Umkm::where('status_verifikasi', 'approved')->get();

        return view('admin.verifikasi.index', compact('pendingUmkms', 'verifiedUmkms'));
    }

    public function approve(Umkm $umkm)
    {
        $umkm->update(['status_verifikasi' => 'approved']);

        return back()->with('success', "UMKM {$umkm->nama_umkm} berhasil disetujui!");
    }

    public function reject(Umkm $umkm)
    {
        $umkm->update(['status_verifikasi' => 'rejected']);

        return back()->with('error', "UMKM {$umkm->nama_umkm} telah ditolak.");
    }
}
