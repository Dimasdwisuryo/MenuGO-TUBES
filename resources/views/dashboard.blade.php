<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="mb-6 text-3xl font-black text-gray-800 tracking-tight">
                Dashboard <span class="text-green-600">Menu</span>GO
            </h1>

            {{-- ================= SUMMARY CARDS (Statistik) ================= --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                @if(auth()->user()->role === 'admin_menugo')
                    {{-- TAMPILAN KHUSUS ADMIN --}}
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-green-100 transition hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <h6 class="text-xs font-bold text-gray-400 uppercase tracking-widest">Total UMKM</h6>
                                <h2 class="text-3xl font-black text-green-600 mt-1">{{ \App\Models\Umkm::count() }}</h2>
                            </div>
                            <div class="bg-green-100 p-3 rounded-2xl text-2xl">🏪</div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-green-100 transition hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <h6 class="text-xs font-bold text-gray-400 uppercase tracking-widest">User Terdaftar</h6>
                                <h2 class="text-3xl font-black text-green-600 mt-1">{{ \App\Models\User::count() }}</h2>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-2xl text-2xl">👥</div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-green-100 transition hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <h6 class="text-xs font-bold text-gray-400 uppercase tracking-widest">Menunggu Verifikasi</h6>
                                <h2 class="text-3xl font-black text-orange-500 mt-1">{{ \App\Models\Umkm::where('status_verifikasi', 'pending')->count() }}</h2>
                            </div>
                            <div class="bg-orange-100 p-3 rounded-2xl text-2xl">⏳</div>
                        </div>
                    </div>

                @else
                    {{-- TAMPILAN KHUSUS OWNER UMKM --}}
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-green-100 transition hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <h6 class="text-xs font-bold text-gray-400 uppercase tracking-widest">Menu Saya</h6>
                                <h2 class="text-3xl font-black text-green-600 mt-1">
                                    {{-- Nanti dihitung berdasarkan relasi menu --}}
                                    0
                                </h2>
                            </div>
                            <div class="bg-green-100 p-3 rounded-2xl text-2xl">🍔</div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-green-100 transition hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <h6 class="text-xs font-bold text-gray-400 uppercase tracking-widest">Status Toko</h6>
                                <h2 class="text-xl font-black {{ auth()->user()->umkm->is_open ? 'text-green-600' : 'text-red-600' }} mt-1 uppercase">
                                    {{ auth()->user()->umkm->is_open ? 'Buka' : 'Tutup' }}
                                </h2>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-2xl text-2xl">🏠</div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-green-100 transition hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <h6 class="text-xs font-bold text-gray-400 uppercase tracking-widest">Verifikasi</h6>
                                <h2 class="text-xl font-black text-orange-500 mt-1 uppercase">
                                    {{ auth()->user()->umkm->status_verifikasi }}
                                </h2>
                            </div>
                            <div class="bg-orange-100 p-3 rounded-2xl text-2xl">📋</div>
                        </div>
                    </div>
                @endif
            </div>

            {{-- ================= WELCOME CARD ================= --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-[2.5rem] border border-gray-100 relative">
                <div class="p-8 md:p-12">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-green-600 rounded-2xl flex items-center justify-center text-white text-2xl font-bold">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div>
                            <h2 class="text-2xl font-black text-gray-800">Selamat Datang, {{ auth()->user()->name }}! 👋</h2>
                            <p class="text-gray-500 font-medium">Masuk sebagai:
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold uppercase tracking-tighter">
                                    {{ str_replace('_', ' ', auth()->user()->role) }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:flex gap-4 border-t border-gray-100 pt-8">
                        @if(auth()->user()->role === 'admin_menugo')
                            <a href="#" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-xl font-bold transition transform hover:-translate-y-1 shadow-lg shadow-green-200">
                                🛡️ Manajemen User
                            </a>
                            <a href="#" class="inline-flex items-center px-6 py-3 border-2 border-green-600 text-green-600 hover:bg-green-50 rounded-xl font-bold transition">
                                ✅ Verifikasi UMKM
                            </a>
                        @else
                            <a href="#" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-xl font-bold transition transform hover:-translate-y-1 shadow-lg shadow-green-200">
                                🍴 Kelola Menu Makanan
                            </a>
                            <a href="#" class="inline-flex items-center px-6 py-3 border-2 border-green-600 text-green-600 hover:bg-green-50 rounded-xl font-bold transition">
                                ⚙️ Pengaturan Toko
                            </a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
