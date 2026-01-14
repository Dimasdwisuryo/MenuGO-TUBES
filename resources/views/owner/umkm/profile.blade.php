<x-app-layout>
    <div class="flex h-screen bg-gray-50 overflow-hidden">
        <aside class="w-64 bg-white border-r border-gray-100 hidden md:flex flex-col shrink-0">
            <div class="p-6">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-4 px-4">Owner Panel</p>
                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Dashboard
                    </a>

                    <a href="{{ route('owner.umkm.profile') }}" class="flex items-center gap-3 px-4 py-3 bg-green-600 text-white rounded-2xl font-bold shadow-lg shadow-green-100 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Profil Toko
                    </a>

                    <a href="{{ route('owner.menu.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        Manajemen Menu
                    </a>
                </nav>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto">
            <div class="p-8 md:p-12">
                <div class="bg-gradient-to-r from-green-600 to-green-500 rounded-[2.5rem] p-8 md:p-12 text-white relative overflow-hidden mb-10 shadow-2xl shadow-green-100">
                    <div class="relative z-10">
                        <h2 class="text-3xl md:text-4xl font-black mb-2 tracking-tight">Profil <span class="text-green-200">UMKM</span></h2>
                        <p class="text-green-50 opacity-90 max-w-xl font-medium text-lg leading-relaxed">
                            Lengkapi informasi bisnis Anda agar memudahkan proses verifikasi dan menarik minat calon pelanggan.
                        </p>
                    </div>
                    <div class="absolute right-0 top-0 opacity-10 translate-x-1/4 -translate-y-1/4">
                        <svg class="w-96 h-96" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                        </svg>
                    </div>
                </div>

                @if(session('success'))
                    <div class="mb-8 p-6 bg-green-50 border border-green-200 text-green-700 rounded-[2rem] font-bold flex items-center gap-4 animate-bounce">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white rounded-[2.5rem] border border-gray-100 p-8 md:p-10 shadow-sm transition hover:shadow-md">
                    <form action="{{ route('owner.umkm.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <div>
                                <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1 tracking-[0.2em]">Nama Bisnis / UMKM</label>
                                <input type="text" name="nama_umkm" value="{{ old('nama_umkm', $umkm->nama_umkm) }}" placeholder="Contoh: Kopi Ketintang" class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-green-500 font-bold text-gray-700 shadow-sm" required>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1 tracking-[0.2em]">Nomor WhatsApp / Telepon</label>
                                <input type="text" name="no_telp" value="{{ old('no_telp', $umkm->no_telp) }}" placeholder="08xxxxxxx" class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-green-500 font-bold text-gray-700 shadow-sm">
                            </div>
                        </div>

                        <div class="mb-8">
                            <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1 tracking-[0.2em]">Alamat Lengkap Usaha</label>
                            <textarea name="alamat" rows="3" placeholder="Jl. Ketintang No..." class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-green-500 font-bold text-gray-700 shadow-sm" required>{{ old('alamat', $umkm->alamat) }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <div>
                                <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1 tracking-[0.2em]">Jam Buka</label>
                                <input type="time" name="jam_buka" value="{{ old('jam_buka', $umkm->jam_buka) }}" class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-green-500 font-bold text-gray-700 shadow-sm">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1 tracking-[0.2em]">Jam Tutup</label>
                                <input type="time" name="jam_tutup" value="{{ old('jam_tutup', $umkm->jam_tutup) }}" class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-green-500 font-bold text-gray-700 shadow-sm">
                            </div>
                        </div>

                        <div class="mb-10">
                            <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1 tracking-[0.2em]">Deskripsi Singkat Usaha</label>
                            <textarea name="deskripsi" rows="4" placeholder="Jelaskan apa yang Anda tawarkan..." class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-green-500 font-bold text-gray-700 shadow-sm">{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
                        </div>

                        <div class="flex items-center gap-4 mb-10 p-4 bg-gray-50 rounded-2xl border border-gray-100">
                            <div class="px-4 py-2 {{ $umkm->status_verifikasi == 'approved' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }} rounded-full text-[10px] font-black uppercase tracking-widest">
                                Status: {{ $umkm->status_verifikasi }}
                            </div>
                            <p class="text-xs text-gray-400 font-medium italic">*Status hanya dapat diubah oleh Admin MenuGO.</p>
                        </div>

                        <button type="submit" class="w-full bg-green-600 text-white py-5 rounded-2xl font-black text-lg shadow-xl shadow-green-100 hover:bg-green-700 transition-all uppercase tracking-[0.2em]">
                            Update Profil Toko
                        </button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
