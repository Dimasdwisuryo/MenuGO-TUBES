<x-app-layout>
    <div class="flex h-screen bg-gray-50 overflow-hidden">
        <aside class="w-64 bg-white border-r border-gray-100 hidden md:flex flex-col shrink-0">
            <div class="p-6">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-4 px-4">Owner Panel</p>
                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('owner.umkm.profile') }}"
                        class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                        Profil Toko
                    </a>
                    <a href="{{ route('owner.menu.index') }}"
                        class="flex items-center gap-3 px-4 py-3 bg-green-600 text-white rounded-2xl font-bold shadow-lg shadow-green-100 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        Manajemen Menu
                    </a>
                </nav>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto">
            <div class="p-8 md:p-12">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
                    <div>
                        <h2 class="text-3xl font-black text-gray-800 uppercase tracking-tight">Koleksi Menu</h2>
                        <p class="text-gray-400 text-sm font-medium mt-1">Daftar produk makanan dan minuman di
                            {{ auth()->user()->umkm->nama_umkm }}</p>
                    </div>
                    <a href="{{ route('owner.menu.create') }}"
                        class="bg-slate-900 text-white px-6 py-3 rounded-2xl font-bold hover:bg-slate-800 transition shadow-xl shadow-slate-200 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Menu
                    </a>
                </div>

                @if (session('success'))
                    <div
                        class="mb-8 p-4 bg-green-50 border border-green-200 text-green-700 rounded-2xl font-bold flex items-center gap-3 shadow-sm">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @forelse($menus as $menu)
                        <div
                            class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden group hover:shadow-2xl hover:shadow-green-100 transition-all duration-500">

                            <div class="relative h-48 overflow-hidden bg-gray-100 flex items-center justify-center">
                                @if ($menu->gambar_menu)
                                    <img src="{{ url($menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                @else
                                    <div class="text-gray-300 flex flex-col items-center gap-2">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span class="text-[10px] font-bold uppercase tracking-widest">No Image</span>
                                    </div>
                                @endif

                                <div class="absolute top-4 left-4">
                                    <span
                                        class="px-3 py-1 bg-white/90 backdrop-blur-md text-[10px] font-black uppercase text-green-600 rounded-lg shadow-sm">
                                        {{ $menu->category?->nama_kategori ?? 'Tanpa Kategori' }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-6">
                                <h3 class="text-lg font-black text-gray-800 uppercase tracking-tight mb-1 line-clamp-1">
                                    {{ $menu->nama_menu }}</h3>

                                <p class="text-gray-500 text-xs mb-3 line-clamp-2 h-8">
                                    {{ $menu->deskripsi_menu ?? 'Tidak ada deskripsi untuk menu ini.' }}
                                </p>

                                <p class="text-green-600 font-black text-xl mb-4">Rp
                                    {{ number_format($menu->harga, 0, ',', '.') }}</p>

                                <div class="flex items-center gap-2">
                                    <a href="{{ route('owner.menu.edit', $menu) }}"
                                        class="flex-1 bg-gray-50 text-gray-600 py-3 rounded-xl font-bold text-xs hover:bg-indigo-600 hover:text-white transition-all text-center">
                                        EDIT
                                    </a>
                                    <form action="{{ route('owner.menu.destroy', $menu) }}" method="POST"
                                        onsubmit="return confirm('Hapus menu {{ $menu->nama_menu }}?')" class="flex-1">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="w-full bg-red-50 text-red-500 py-3 rounded-xl font-bold text-xs hover:bg-red-500 hover:text-white transition-all">
                                            HAPUS
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div
                            class="col-span-full py-20 bg-white rounded-[3rem] border-2 border-dashed border-gray-100 flex flex-col items-center justify-center text-center p-8">
                            <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-black text-gray-800 uppercase mb-2">Belum Ada Menu</h3>
                            <p class="text-gray-400 font-medium mb-8 max-w-xs">Mulailah menambahkan produk makanan atau
                                minuman terbaik Anda sekarang.</p>
                            <a href="{{ route('owner.menu.create') }}"
                                class="bg-green-600 text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-green-100">Tambah
                                Menu Pertama</a>
                        </div>
                    @endforelse
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
