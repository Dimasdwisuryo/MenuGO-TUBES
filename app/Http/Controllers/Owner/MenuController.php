<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    // 1. Tampilkan Daftar Menu
    public function index()
    {
        $menus = Menu::with('category')
            ->where('umkm_id', auth()->user()->umkm->id)
            ->get();
        return view('owner.menu.index', compact('menus'));
    }

    // 2. Tampilkan Form Tambah Menu
    public function create()
    {
        $categories = Category::all();
        return view('owner.menu.create', compact('categories'));
    }

    // 3. Simpan Menu Baru (LOGIKA DIUBAH KE PUBLIC PATH)
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'category_id' => 'required|exists:categories,id',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'gambar_menu' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Sesuaikan name di form
        ]);

        $file = $request->file('gambar_menu');
        $namaFile = time() . '.' . $file->getClientOriginalExtension();

        // Simpan fisik file ke public/menus
        $file->move(public_path('menus'), $namaFile);

        Menu::create([
            'umkm_id' => auth()->user()->umkm->id,
            'category_id' => $request->category_id,
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            // PERBAIKAN: Nama kolom database adalah deskripsi_menu
            'deskripsi_menu' => $request->deskripsi,
            'gambar_menu' => 'menus/' . $namaFile,
            'is_available' => true,
        ]);

        return redirect()->route('owner.menu.index')->with('success', 'Menu Berhasil Ditambahkan!');
    }

    // 4. Tampilkan Form Edit Menu
    public function edit(Menu $menu)
    {
        $categories = \App\Models\Category::all();
        return view('owner.menu.edit', compact('menu', 'categories'));
    }

    // 5. Update Menu (LOGIKA DIUBAH KE PUBLIC PATH)
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu'   => 'required|string|max:255',
            'category_id' => 'required',
            'harga'       => 'required|numeric',
            'deskripsi'   => 'nullable|string',
            'gambar_menu' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'nama_menu'      => $request->nama_menu,
            'category_id'    => $request->category_id,
            'harga'          => $request->harga,
            // PERBAIKAN: Tambahkan agar deskripsi ikut terupdate
            'deskripsi_menu' => $request->deskripsi,
        ];

        // PERBAIKAN: Gunakan nama kolom 'gambar_menu' bukan 'foto'
        if ($request->hasFile('gambar_menu')) {
            // Hapus foto lama jika ada di public/menus
            if ($menu->gambar_menu && file_exists(public_path($menu->gambar_menu))) {
                unlink(public_path($menu->gambar_menu));
            }

            // Simpan foto baru langsung ke public/menus
            $file = $request->file('gambar_menu');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('menus'), $namaFile);
            $data['gambar_menu'] = 'menus/' . $namaFile;
        }

        $menu->update($data);

        return redirect()->route('owner.menu.index')->with('success', 'Menu berhasil diperbarui!');
    }

    // 6. Hapus Menu
    public function destroy(Menu $menu)
    {
        // PERBAIKAN: Gunakan nama kolom 'gambar_menu' bukan 'foto'
        if ($menu->gambar_menu && file_exists(public_path($menu->gambar_menu))) {
            unlink(public_path($menu->gambar_menu));
        }

        $menu->delete();
        return back()->with('success', 'Menu berhasil dihapus!');
    }
}
