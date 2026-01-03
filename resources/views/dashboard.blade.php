<x-app-layout>
    <div class="flex h-screen bg-gray-50 overflow-hidden">

        <aside class="w-64 bg-white border-r border-gray-100 hidden md:flex flex-col shrink-0">
            <div class="p-6">

                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-4 px-4">Admin Panel</p>
                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-green-600 text-white rounded-2xl font-bold shadow-lg shadow-green-100 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard
                    </a>

                    @if(auth()->user()->role === 'admin_menugo')
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Manajemen User
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Verifikasi UMKM
                    </a>
                    @else
                    <a href="{{ route('owner.profile.edit') }}" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        Profil Toko
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="currentColor"></path></svg>
                        Kelola Menu
                    </a>
                    @endif
                </nav>
            </div>

            <div class="mt-auto p-6 border-t border-gray-50">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 w-full rounded-2xl font-bold transition group">
                        <svg class="w-5 h-5 transition group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-hidden">

            <div class="flex-1 overflow-y-auto p-8 md:p-12">

                <div class="bg-gradient-to-r from-green-600 to-green-500 rounded-[2.5rem] p-8 md:p-12 text-white relative overflow-hidden mb-8 shadow-2xl shadow-green-100">
                    <div class="relative z-10">
                        <h2 class="text-3xl md:text-4xl font-black mb-2">Selamat Datang, {{ auth()->user()->role === 'admin_menugo' ? 'Admin' : 'Owner' }} MenuGO! 👋</h2>
                        <p class="text-green-50 opacity-90 max-w-xl font-medium text-lg leading-relaxed">Panel kendali utama MenuGO. Kelola ekosistem digital UMKM Anda di sini dengan mudah dan cepat.</p>
                    </div>
                    <div class="absolute right-0 top-0 opacity-10 translate-x-1/4 -translate-y-1/4">
                        <svg class="w-96 h-96" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                    @if(auth()->user()->role === 'admin_menugo')
                    <div class="bg-white p-7 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow">
                        <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest mb-1">Total UMKM</p>
                        <h3 class="text-3xl font-black text-gray-800">{{ \App\Models\Umkm::count() }}</h3>
                    </div>
                    <div class="bg-white p-7 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow">
                        <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest mb-1">Total Menu Tersedia</p>
                        <h3 class="text-3xl font-black text-gray-800">6</h3>
                    </div>
                    <div class="bg-white p-7 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow">
                        <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest mb-1">Total Menu Tidak Tersedia</p>
                        <h3 class="text-3xl font-black text-gray-800">100</h3>
                    </div>
                    <div class="bg-white p-7 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow">
                        <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest mb-1">Menunggu Verifikasi</p>
                        <h3 class="text-3xl font-black text-gray-800">100</h3>
                    </div>
                    @else
                    <div class="bg-white p-7 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow col-span-2">
                        <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest mb-1">Nama Toko Saya</p>
                        <h3 class="text-2xl font-black text-gray-800">{{ auth()->user()->umkm->nama_toko }}</h3>
                    </div>
                    <div class="bg-white p-7 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow">
                        <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest mb-1">Status Toko</p>
                        <h3 class="text-xl font-black text-green-600 tracking-tighter">{{ auth()->user()->umkm->is_open ? 'BUKA' : 'TUTUP' }}</h3>
                    </div>
                    @endif
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                        <h4 class="font-black text-gray-800 mb-8 text-lg tracking-tight">Aktivitas Mingguan UMKM</h4>
                        <div class="flex items-end gap-4 h-56">
                            @foreach([25, 45, 100, 35, 60, 90] as $height)
                                <div class="w-full bg-green-100 hover:bg-green-600 rounded-t-2xl transition-all duration-300 cursor-pointer group relative" style="height: {{ $height }}%">
                                    <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition shadow-xl">{{ $height }}%</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex justify-between mt-6 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                            <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span>
                        </div>
                    </div>

                    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                        <h4 class="font-black text-gray-800 mb-8 text-lg tracking-tight italic">Popularitas</h4>
                        <div class="space-y-6">
                            <div>
                                <div class="flex justify-between text-xs font-bold mb-2 text-gray-600"><span>Makanan</span><span>60%</span></div>
                                <div class="w-full bg-gray-50 h-3 rounded-full overflow-hidden shadow-inner"><div class="bg-green-600 h-full rounded-full transition-all duration-1000" style="width: 60%"></div></div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs font-bold mb-2 text-gray-600"><span>Minuman</span><span>30%</span></div>
                                <div class="w-full bg-gray-50 h-3 rounded-full overflow-hidden shadow-inner"><div class="bg-blue-500 h-full rounded-full transition-all duration-1000" style="width: 30%"></div></div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs font-bold mb-2 text-gray-600"><span>Snack</span><span>10%</span></div>
                                <div class="w-full bg-gray-50 h-3 rounded-full overflow-hidden shadow-inner"><div class="bg-yellow-500 h-full rounded-full transition-all duration-1000" style="width: 10%"></div></div>
                            </div>
                        </div>
                        <div class="mt-10 p-4 bg-green-50 rounded-2xl border border-green-100 text-center">
                            <p class="text-[10px] font-bold text-green-700 uppercase leading-none">Insight</p>
                            <p class="text-xs text-green-600 mt-2 font-medium">Penjualan meningkat pada akhir pekan!</p>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</x-app-layout>
