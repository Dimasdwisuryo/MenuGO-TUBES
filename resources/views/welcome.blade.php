<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MenuGO - Digitalkan UMKM Ketintang</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-50 text-gray-900">

    <nav class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-green-600">Menu<span class="text-gray-800">GO</span></span>
                </div>

                <div class="hidden md:flex space-x-8 items-center">
                    <a href="#beranda" class="text-gray-600 hover:text-green-600 font-semibold transition">Beranda</a>
                    <a href="#jelajahi" class="text-gray-600 hover:text-green-600 font-semibold transition">Jelajahi Menu</a>
                    <a href="#daftar-umkm" class="text-gray-600 hover:text-green-600 font-semibold transition">Daftar UMKM</a>

                    <div class="h-6 w-[1px] bg-gray-300 mx-2"></div>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="bg-green-600 text-white px-6 py-2.5 rounded-full font-bold hover:bg-green-700 transition shadow-lg shadow-green-200">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-gray-600 font-bold hover:text-green-600 transition">Masuk</a>
                            <a href="{{ route('register') }}"
                                class="bg-green-600 text-white px-6 py-2.5 rounded-full font-bold hover:bg-green-700 transition shadow-lg shadow-green-200">Mulai Sekarang</a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <section id="beranda" class="min-h-[calc(100vh-80px)] flex items-center bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h1 class="text-5xl md:text-6xl font-black leading-tight text-gray-800">
                        Digitalkan <span class="text-green-600">UMKM</span><br>
                        <span class="text-green-600">Kuliner</span> Anda<br>
                        Bersama MenuGO
                    </h1>
                    <p class="text-lg text-gray-600 leading-relaxed max-w-lg">
                        Kelola menu, pantau penjualan, dan jangkau lebih banyak pelanggan hanya dalam satu aplikasi yang
                        mudah dan responsif.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="{{ route('register') }}"
                            class="bg-green-600 text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-green-700 transition transform hover:-translate-y-1 shadow-xl shadow-green-200">
                            Mulai Sekarang
                        </a>
                        <a href="#jelajahi"
                            class="border-2 border-green-600 text-green-600 px-8 py-4 rounded-full font-bold text-lg hover:bg-green-50 transition">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
                <div class="relative flex justify-center">
                    <div class="relative w-full max-w-md">
                        <div
                            class="absolute -top-10 -right-10 w-64 h-64 bg-green-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-pulse">
                        </div>
                        <div
                            class="absolute -bottom-10 -left-10 w-64 h-64 bg-green-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-pulse delay-700">
                        </div>

                        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&q=80&w=1000" alt="MenuGO Promo"
                            class="relative rounded-[2rem] shadow-2xl transform rotate-2 hover:rotate-0 transition duration-500 border-8 border-white object-cover h-[500px] w-full">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="jelajahi" class="py-24 bg-gray-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800">Menu Yang Tersedia</h2>
                <p class="text-gray-600">Temukan menu dari berbagai kategori UMKM sekitar Ketintang</p>
            </div>

            <div class="flex flex-wrap justify-center gap-4 mb-12 text-center">
                <a href="{{ url('/#jelajahi') }}"
                    class="px-6 py-2 rounded-full font-semibold border-2 border-green-600 {{ !request('category') ? 'bg-green-600 text-white shadow-lg' : 'text-green-600 hover:bg-green-50' }} transition-all duration-300">
                    Semua
                </a>

                @foreach ($categories as $category)
                    <a href="{{ url('/?category=' . $category->id . '#jelajahi') }}"
                        class="px-6 py-2 rounded-full font-semibold border-2 border-green-600 {{ request('category') == $category->id ? 'bg-green-600 text-white shadow-lg' : 'text-green-600 hover:bg-green-50' }} transition-all duration-300">
                        {{ $category->nama_kategori }}
                    </a>
                @endforeach
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @forelse($menus as $menu)
                    <div
                        class="bg-white p-4 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                        <div class="h-48 bg-gray-100 rounded-2xl mb-4 overflow-hidden">
                            <img src="{{ $menu->gambar_menu ? url($menu->gambar_menu) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&q=80&w=500' }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                                alt="{{ $menu->nama_menu }}">
                        </div>
                        <p class="text-[10px] font-bold text-green-600 uppercase mb-1">
                            {{ $menu->category->nama_kategori ?? 'Umum' }}</p>
                        <h4 class="font-bold text-lg text-gray-800 line-clamp-1">{{ $menu->nama_menu }}</h4>
                        <p class="text-gray-400 text-xs mb-2 truncate">{{ $menu->umkm->nama_umkm }}</p>
                        <p class="text-green-600 font-extrabold mt-1 text-lg">Rp
                            {{ number_format($menu->harga, 0, ',', '.') }}</p>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 text-gray-400 font-medium">Belum ada menu yang tersedia.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="daftar-umkm" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center md:items-end mb-12 gap-4">
                <div class="text-center md:text-left">
                    <h2 class="text-3xl md:text-4xl font-bold mb-2 text-gray-800">Daftar UMKM Ketintang Surabaya</h2>
                    <p class="text-gray-600">Mitra kuliner yang terdaftar di sekitar kampus Ketintang Surabaya.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse ($umkms as $u)
                    <div
                        class="group bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500">
                        <div class="relative h-60">
                            <img src="{{ $u->logo_toko ? url($u->logo_toko) : 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&q=80&w=500' }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                                alt="{{ $u->nama_umkm }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <span
                                class="absolute bottom-4 left-4 bg-white text-green-600 text-xs font-black px-4 py-1.5 rounded-xl shadow-sm">
                                {{ strtoupper($u->status_verifikasi) }}
                            </span>
                        </div>
                        <div class="p-8">
                            <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $u->nama_umkm }}</h3>
                            <div class="flex items-center text-sm text-gray-500">
                                <span class="flex items-center gap-1 truncate">📍
                                    {{ Str::limit($u->alamat, 25) }}</span>
                                <span class="mx-2">•</span>
                                <span class="text-orange-500 font-bold flex items-center gap-1">★ 4.8</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 text-gray-400 font-medium">Belum ada mitra UMKM
                        terdaftar.</div>
                @endforelse
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-3xl font-bold text-green-500 mb-4">Menu<span class="text-white">GO</span></p>
            <p class="text-gray-400 mb-10 max-w-md mx-auto leading-relaxed">Solusi digitalisasi UMKM kuliner di
                Ketintang, Surabaya. Kelola bisnis kuliner Anda dengan lebih cerdas dan modern.</p>
            <p class="border-t border-gray-800 pt-8 text-sm text-gray-500">2026 MenuGO Project - Built with Laravel 10
                & Tailwind CSS.</p>
        </div>
    </footer>

</body>

</html>
