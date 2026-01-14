<x-app-layout>
    <div class="flex h-screen bg-gray-50 overflow-hidden">

        <aside class="w-64 bg-white border-r border-gray-100 hidden md:flex flex-col shrink-0">
            <div class="p-6">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-4 px-4">Admin Panel</p>
                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 bg-green-600 text-white rounded-2xl font-bold shadow-lg shadow-green-100 transition">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        Dashboard
                    </a>

                    @if (auth()->user()->role === 'admin_menugo')
                        <a href="{{ route('admin.users.index') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                            <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                            Manajemen User
                        </a>
                        <a href="{{ route('admin.categories.index') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                            <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            Manajemen Kategori
                        </a>
                        <a href="{{ route('admin.verifikasi.index') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                            <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Verifikasi UMKM
                        </a>
                    @else
                        <a href="{{ route('owner.umkm.profile') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                            <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                            Profil Toko
                        </a>
                        <a href="{{ route('owner.menu.index') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                            <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M4 6h16M4 12h16M4 18h16" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                            Manajemen Menu
                        </a>
                    @endif
                </nav>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-hidden">
            <div class="flex-1 overflow-y-auto p-8 md:p-12">
                <div
                    class="bg-gradient-to-r from-green-600 to-green-500 rounded-[2.5rem] p-8 md:p-12 text-white relative overflow-hidden mb-8 shadow-2xl shadow-green-100">
                    <div class="relative z-10">
                        <h2 class="text-3xl md:text-4xl font-black mb-2">Selamat Datang,
                            {{ auth()->user()->role === 'admin_menugo' ? 'Admin' : 'Owner' }} MenuGO! 👋</h2>
                        <p class="text-green-50 opacity-90 max-w-xl font-medium text-lg leading-relaxed">Panel kendali
                            utama MenuGO. Kelola ekosistem digital UMKM Anda di sini dengan mudah dan cepat.</p>
                    </div>
                    <div class="absolute right-0 top-0 opacity-10 translate-x-1/4 -translate-y-1/4">
                        <svg class="w-96 h-96" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                        </svg>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-10">
                    @if (auth()->user()->role === 'admin_menugo')
                        <div
                            class="bg-white p-5 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow">
                            <p class="text-gray-400 text-[9px] font-bold uppercase tracking-widest mb-1">Total User</p>
                            <h3 class="text-2xl font-black text-gray-800">{{ \App\Models\User::count() }}</h3>
                        </div>
                        <div
                            class="bg-white p-5 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow">
                            <p class="text-gray-400 text-[9px] font-bold uppercase tracking-widest mb-1">Total Kategori
                                UMKM</p>
                            <h3 class="text-2xl font-black text-gray-800">{{ \App\Models\Category::count() }}</h3>
                        </div>
                        <div
                            class="bg-white p-5 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow">
                            <p class="text-gray-400 text-[9px] font-bold uppercase tracking-widest mb-1">Total Menu</p>
                            <h3 class="text-2xl font-black text-gray-800">{{ \App\Models\Menu::count() }}</h3>
                        </div>
                        <div
                            class="bg-white p-5 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow">
                            <p class="text-gray-400 text-[9px] font-bold uppercase tracking-widest mb-1 text-amber-500">
                                Menunggu Verifikasi</p>
                            <h3 class="text-2xl font-black text-amber-500">
                                {{ \App\Models\Umkm::where('status_verifikasi', 'pending')->count() }}</h3>
                        </div>
                    @else
                        <div
                            class="bg-white p-5 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow">
                            <p class="text-gray-400 text-[9px] font-bold uppercase tracking-widest mb-1">Nama Toko Saya
                            </p>
                            <h3 class="text-xl font-black text-gray-800 truncate">
                                {{ $umkm ? $umkm->nama_umkm : 'Belum ada Toko' }}</h3>
                            <p class="text-[8px] text-green-600 font-bold mt-1 uppercase tracking-tighter">Verified
                                Partner MenuGO</p>
                        </div>

                        <div
                            class="bg-white p-5 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow relative overflow-hidden group">
                            <div class="relative z-10">
                                <p class="text-gray-400 text-[9px] font-bold uppercase tracking-widest mb-1">Total Menu
                                    Koleksi</p>
                                <div class="flex items-baseline gap-1">
                                    <h3 class="text-3xl font-black text-gray-800">{{ $totalMenu }}</h3>
                                    <span
                                        class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Item</span>
                                </div>
                            </div>
                            <div
                                class="absolute -right-2 -bottom-2 opacity-5 group-hover:opacity-10 transition-opacity">
                                <svg class="w-16 h-16 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-3v8h2.5v8H21V2c-2.76 0-5 2.24-5 4z" />
                                </svg>
                            </div>
                        </div>

                        <div
                            class="bg-white p-5 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow">
                            <p class="text-gray-400 text-[9px] font-bold uppercase tracking-widest mb-1">Status
                                Operasional</p>
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-3 h-3 rounded-full {{ $umkm && $umkm->is_active ? 'bg-green-500 animate-pulse' : 'bg-red-500' }}">
                                </div>
                                <h3
                                    class="text-lg font-black {{ $umkm && $umkm->is_active ? 'text-green-600' : 'text-red-600' }} tracking-tighter">
                                    {{ $umkm && $umkm->is_active ? 'BUKA' : 'TUTUP' }}</h3>
                            </div>
                        </div>

                        <div
                            class="bg-white p-5 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow">
                            <p class="text-gray-400 text-[9px] font-bold uppercase tracking-widest mb-1">Update
                                Terakhir</p>
                            <h3 class="text-xl font-black text-gray-800">{{ now()->format('d M') }}</h3>
                            <p class="text-[8px] text-gray-400 font-bold mt-1 uppercase tracking-tighter">Sistem MenuGO
                            </p>
                        </div>
                    @endif
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                        <h4 class="font-black text-gray-800 mb-8 text-lg tracking-tight">Input Menu 7 Hari Terakhir
                        </h4>
                        <div class="flex items-end gap-4 h-56">
                            @php $days = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']; @endphp
                            @foreach ($weeklyData as $index => $value)
                                @php
                                    $maxVal = max($weeklyData) > 0 ? max($weeklyData) : 1;
                                    $height = ($value / $maxVal) * 100;
                                @endphp
                                <div class="w-full bg-green-100 hover:bg-green-600 rounded-t-2xl transition-all duration-300 cursor-pointer group relative"
                                    style="height: {{ $height }}%">
                                    <div
                                        class="absolute -top-10 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-[10px] px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition shadow-xl whitespace-nowrap">
                                        {{ $value }} Menu
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div
                            class="flex justify-between mt-6 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                            @foreach ($days as $day)
                                <span>{{ $day }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                        <h4 class="font-black text-gray-800 mb-8 text-lg tracking-tight">Distribusi Kategori</h4>
                        <div class="space-y-6">
                            @foreach ($stats as $label => $data)
                                @php
                                    $color = match ($label) {
                                        'makanan' => 'bg-green-600',
                                        'minuman' => 'bg-blue-500',
                                        'snack' => 'bg-yellow-500',
                                        default => 'bg-gray-400',
                                    };
                                @endphp
                                <div>
                                    <div class="flex justify-between text-xs font-bold mb-2 text-gray-600">
                                        <span class="uppercase">{{ $label }}</span>
                                        <span>{{ $data['percentage'] }}% ({{ $data['count'] }})</span>
                                    </div>
                                    <div class="w-full bg-gray-50 h-3 rounded-full overflow-hidden shadow-inner">
                                        <div class="{{ $color }} h-full rounded-full transition-all duration-1000"
                                            style="width: {{ $data['percentage'] }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-10 p-4 bg-green-50 rounded-2xl border border-green-100 text-center">
                            <p class="text-[10px] font-bold text-green-700 uppercase leading-none">Insight</p>
                            <p class="text-xs text-green-600 mt-2 font-medium">
                                {{ isset($stats['makanan']) && isset($stats['minuman']) && $stats['makanan']['count'] > $stats['minuman']['count'] ? 'Fokus pada variasi makanan!' : 'Minuman cukup populer di toko Anda.' }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</x-app-layout>
