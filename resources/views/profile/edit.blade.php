<x-app-layout>
    <div class="flex h-screen bg-gray-50 overflow-hidden">
        <aside class="w-64 bg-white border-r border-gray-100 hidden md:flex flex-col shrink-0">
            <div class="p-6">
                <div class="flex items-center gap-3 mb-10 px-2">
                </div>

                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-4 px-4">Owner Panel</p>
                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 rounded-2xl font-semibold transition group">
                        <svg class="w-5 h-5 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                        Dashboard
                    </a>

                    <a href="{{ route('owner.umkm.profile') }}" class="flex items-center gap-3 px-4 py-3 bg-green-600 text-white rounded-2xl font-bold shadow-lg shadow-green-100 transition">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                        <h2 class="text-3xl md:text-4xl font-black mb-2 tracking-tight">Pengaturan Profil Toko</h2>
                        <p class="text-green-50 opacity-90 max-w-xl font-medium text-lg leading-relaxed">
                            Kelola informasi identitas pemilik usaha, perbarui kredensial akun, dan pastikan data UMKM Anda tetap terverifikasi.
                        </p>
                    </div>
                    <div class="absolute right-0 top-0 opacity-10 translate-x-1/4 -translate-y-1/4">
                        <svg class="w-96 h-96" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                        </svg>
                    </div>
                </div>

                <div class="w-full space-y-8">
                    <div class="bg-white rounded-[2.5rem] border border-gray-100 p-8 md:p-10 shadow-sm transition hover:shadow-md">
                        <div class="w-full">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="bg-white rounded-[2.5rem] border border-gray-100 p-8 md:p-10 shadow-sm transition hover:shadow-md">
                        <div class="w-full">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="bg-white rounded-[2.5rem] border border-red-100 p-8 md:p-10 shadow-sm transition hover:shadow-md">
                        <div class="w-full">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
