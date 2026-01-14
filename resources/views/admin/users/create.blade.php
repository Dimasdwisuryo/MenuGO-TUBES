<x-app-layout>
    <div class="flex h-screen bg-gray-50 overflow-hidden text-gray-900">

        <aside class="w-64 bg-white border-r border-gray-100 hidden md:flex flex-col shrink-0 shadow-sm">
            <div class="p-8">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-6">Admin Panel</p>
                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-green-50 hover:text-green-600 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 transition group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-3 bg-green-600 text-white rounded-2xl font-bold shadow-lg shadow-green-100 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Manajemen User
                    </a>
                      <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-green-50 hover:text-green-600 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        Manajemen Kategori
                    </a>
                    <a href="{{ route('admin.verifikasi.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Verifikasi UMKM
                    </a>
                </nav>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto">
            <div class="p-8 md:p-12">

                <div class="flex items-center gap-4 mb-10">
                    <a href="{{ route('admin.users.index') }}" class="p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:bg-green-600 hover:text-white transition shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    </a>
                    <div>
                        <h2 class="text-3xl font-black text-gray-800 tracking-tight">Buat User <span class="text-green-600 border-b-4 border-green-100">Baru</span></h2>
                        <p class="text-gray-400 text-sm font-medium mt-1">Silakan lengkapi formulir di bawah ini untuk mendaftarkan akun.</p>
                    </div>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-green-50 shadow-2xl shadow-green-600/5 p-10 max-w-4xl relative overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-green-600/5 rounded-full blur-3xl"></div>

                    <form action="{{ route('admin.users.store') }}" method="POST" class="relative z-10 space-y-8">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="text-[11px] font-black text-gray-400 uppercase tracking-widest ml-4">Nama Lengkap</label>
                                <input type="text" name="name" required placeholder="Contoh: Budi Santoso" class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-4 focus:ring-green-500/10 font-bold text-gray-700 transition-all">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[11px] font-black text-gray-400 uppercase tracking-widest ml-4">Alamat Email</label>
                                <input type="email" name="email" required placeholder="email@menugo.com" class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-4 focus:ring-green-500/10 font-bold text-gray-700 transition-all">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[11px] font-black text-gray-400 uppercase tracking-widest ml-4">Tentukan Role</label>
                                <select name="role" class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-4 focus:ring-green-500/10 font-black text-gray-600 appearance-none transition-all">
                                    <option value="owner">Owner UMKM</option>
                                    <option value="admin_menugo">Admin MenuGO</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[11px] font-black text-gray-400 uppercase tracking-widest ml-4">Password Akun</label>
                                <input type="password" name="password" required class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-4 focus:ring-green-500/10 font-bold transition-all">
                            </div>
                            <div class="space-y-2 md:col-span-2">
                                <label class="text-[11px] font-black text-gray-400 uppercase tracking-widest ml-4">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" required class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-4 focus:ring-green-500/10 font-bold transition-all">
                            </div>
                        </div>

                        <div class="pt-6">
                            <button type="submit" class="w-full py-5 bg-gradient-to-r from-green-600 to-green-500 text-white font-black rounded-[2rem] shadow-xl shadow-green-200 hover:scale-[1.02] active:scale-95 transition-all uppercase tracking-widest text-sm">
                                Simpan & Daftarkan Akun
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </main>
    </div>
</x-app-layout>
