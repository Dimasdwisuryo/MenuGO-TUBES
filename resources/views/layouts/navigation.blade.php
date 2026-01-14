<header class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-8 shrink-0 z-50 shadow-sm">
    <div class="flex items-center gap-10">
        <div class="shrink-0 flex items-center pr-6 border-r border-gray-100">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
                <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center transition group-hover:bg-green-100">
                    <div class="w-10 h-10 bg-green-600 rounded-xl flex items-center justify-center shadow-lg shadow-green-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                    </div>
                </div>
                <span class="text-2xl font-black tracking-tighter text-gray-800">
                    Menu<span class="text-green-600">GO</span>
                </span>
            </a>
        </div>

        <nav class="hidden lg:flex items-center gap-2">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-4 py-2 rounded-xl text-[13px] font-bold transition-all {{ request()->routeIs('dashboard') ? 'bg-green-50 text-green-600' : 'text-gray-500 hover:bg-gray-50 hover:text-green-600' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dashboard
            </a>

            @if(auth()->user()->role === 'admin_menugo')
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-2 px-4 py-2 rounded-xl text-[13px] font-bold transition-all {{ request()->routeIs('admin.users.*') ? 'bg-green-50 text-green-600' : 'text-gray-500 hover:bg-gray-50 hover:text-green-600' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Manajemen User
                </a>
                <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-2 px-4 py-2 rounded-xl text-[13px] font-bold transition-all {{ request()->routeIs('admin.categories.*') ? 'bg-green-50 text-green-600' : 'text-gray-500 hover:bg-gray-50 hover:text-green-600' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    Manajemen Kategori
                </a>
                <a href="{{ route('admin.verifikasi.index') }}" class="flex items-center gap-2 px-4 py-2 rounded-xl text-[13px] font-bold transition-all {{ request()->routeIs('admin.verifikasi.*') ? 'bg-green-50 text-green-600' : 'text-gray-500 hover:bg-gray-50 hover:text-green-600' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Verifikasi UMKM
                </a>
            @else
                {{-- PERBAIKAN: href menggunakan owner.umkm.profile dan routeIs mengecek owner.umkm.profile.* --}}
                <a href="{{ route('owner.umkm.profile') }}" class="flex items-center gap-2 px-4 py-2 rounded-xl text-[13px] font-bold transition-all {{ request()->routeIs('owner.umkm.profile*') ? 'bg-green-50 text-green-600' : 'text-gray-500 hover:bg-gray-50 hover:text-green-600' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    Profil Toko
                </a>
                <a href="{{ route('owner.menu.index') }}" class="flex items-center gap-2 px-4 py-2 rounded-xl text-[13px] font-bold transition-all {{ request()->routeIs('owner.menu.*') ? 'bg-green-50 text-green-600' : 'text-gray-500 hover:bg-gray-50 hover:text-green-600' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    Manajemen Menu
                </a>
            @endif
        </nav>
    </div>

    <div class="flex items-center gap-6">
        <div class="h-8 w-[1px] bg-gray-100 mx-1"></div>

        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="flex items-center gap-3 focus:outline-none group">
                    <div class="text-right hidden sm:block">
                        <p class="text-[13px] font-black text-gray-800 leading-none mb-1 group-hover:text-green-600 transition">{{ auth()->user()->name }}</p>
                        <span class="text-[9px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-md uppercase tracking-tighter shadow-sm">{{ str_replace('_', ' ', auth()->user()->role) }}</span>
                    </div>
                    <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center text-green-700 font-bold border-2 border-green-50 shadow-sm transition group-hover:scale-105">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                @if(auth()->user()->role === 'owner')
                    {{-- UPDATE: Dropdown link juga harus mengarah ke owner.umkm.profile --}}
                    <x-dropdown-link :href="route('owner.umkm.profile')" class="text-xs font-bold text-gray-700">
                        {{ __('Profil Toko') }}
                    </x-dropdown-link>
                @else
                    <x-dropdown-link :href="route('profile.edit')" class="text-xs font-bold text-gray-700">
                        {{ __('Profile Settings') }}
                    </x-dropdown-link>
                @endif

                <div class="border-t border-gray-100 my-1"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="text-red-600 font-black text-xs uppercase">
                        {{ __('Logout') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</header>
