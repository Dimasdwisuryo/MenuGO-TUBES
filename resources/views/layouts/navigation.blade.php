<header class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-8 shrink-0 z-50 shadow-sm">
    <div class="flex items-center gap-10">
        <div class="shrink-0 flex items-center pr-6 border-r border-gray-100">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
                <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center transition group-hover:bg-green-100">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
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
                <a href="#" class="flex items-center gap-2 px-4 py-2 rounded-xl text-[13px] font-bold text-gray-500 hover:bg-gray-50 hover:text-green-600 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Manajemen User
                </a>
                <a href="#" class="flex items-center gap-2 px-4 py-2 rounded-xl text-[13px] font-bold text-gray-500 hover:bg-gray-50 hover:text-green-600 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Verifikasi UMKM
                </a>
            @else
                <a href="#" class="flex items-center gap-2 px-4 py-2 rounded-xl text-[13px] font-bold text-gray-500 hover:bg-gray-50 hover:text-green-600 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    Profil Toko
                </a>
            @endif
        </nav>
    </div>

    <div class="flex items-center gap-6">
        <div class="relative hidden xl:block">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </span>
            <input type="text" placeholder="Search data..." class="w-72 pl-10 pr-4 py-2 bg-gray-50 border-none rounded-xl text-xs text-gray-600 placeholder-gray-400 focus:ring-2 focus:ring-green-500/20 transition-all">
        </div>

        <button class="text-gray-400 hover:text-green-600 transition relative p-2 hover:bg-green-50 rounded-xl">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
            <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
        </button>

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
                <x-dropdown-link :href="route('profile.edit')" class="text-xs font-bold text-gray-700">
                    {{ __('Profile Settings') }}
                </x-dropdown-link>

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
