<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar - MenuGO</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gradient-to-br from-gray-50 to-green-50/30">
    <div class="min-h-screen flex flex-col justify-center items-center p-6">

        <div class="max-w-md w-full bg-white/80 backdrop-blur-xl rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] p-10 md:p-12 border border-white relative overflow-hidden">

            <div class="absolute -top-10 -right-10 w-32 h-32 bg-green-100 rounded-full blur-3xl opacity-50"></div>

            <div class="text-center mb-8 relative">
                <h2 class="text-3xl font-black text-gray-800 tracking-tight">
                    <span class="text-green-600">Menu</span>GO
                </h2>
                <p class="mt-2 text-sm text-gray-500 font-medium px-4 leading-relaxed">
                    Daftar akun untuk mulai mendigitalkan UMKM Anda
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4 relative">
                @csrf

                <div class="group">
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-1.5 ml-1 group-focus-within:text-green-600 transition-colors">Nama Lengkap</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-green-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </span>
                        <input id="name"
                               class="block w-full pl-12 pr-5 py-3.5 rounded-2xl border-gray-100 bg-gray-50/50 focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 shadow-sm"
                               type="text" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required autofocus />
                    </div>
                    @error('name') <p class="text-red-500 text-xs mt-1.5 ml-1 font-medium">{{ $message }}</p> @enderror
                </div>

                <div class="group">
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-1.5 ml-1 group-focus-within:text-green-600 transition-colors">Alamat Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-green-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </span>
                        <input id="email"
                               class="block w-full pl-12 pr-5 py-3.5 rounded-2xl border-gray-100 bg-gray-50/50 focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 shadow-sm"
                               type="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required />
                    </div>
                    @error('email') <p class="text-red-500 text-xs mt-1.5 ml-1 font-medium">{{ $message }}</p> @enderror
                </div>

                <div class="group">
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-1.5 ml-1 group-focus-within:text-green-600 transition-colors">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-green-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </span>
                        <input id="password"
                               class="block w-full pl-12 pr-5 py-3.5 rounded-2xl border-gray-100 bg-gray-50/50 focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 shadow-sm"
                               type="password" name="password" placeholder="Minimal 8 karakter" required />
                    </div>
                    @error('password') <p class="text-red-500 text-xs mt-1.5 ml-1 font-medium">{{ $message }}</p> @enderror
                </div>

                <div class="group">
                    <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-1.5 ml-1 group-focus-within:text-green-600 transition-colors">Konfirmasi Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-green-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </span>
                        <input id="password_confirmation"
                               class="block w-full pl-12 pr-5 py-3.5 rounded-2xl border-gray-100 bg-gray-50/50 focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 shadow-sm"
                               type="password" name="password_confirmation" placeholder="Ulangi password" required />
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full py-4 rounded-full shadow-xl shadow-green-200/50 text-sm font-extrabold text-white bg-green-600 hover:bg-green-700 active:scale-95 transition-all duration-300 transform hover:-translate-y-1">
                        Daftar Sekarang
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center relative">
                <p class="text-sm text-gray-500 font-medium">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="font-bold text-green-600 hover:text-green-700 transition-colors underline underline-offset-4 decoration-green-200">
                        Masuk di sini
                    </a>
                </p>
            </div>
        </div>

        <div class="mt-10 text-center text-xs text-gray-400 font-semibold uppercase tracking-widest">
            © 2025 MenuGO Project — Tugas Besar
        </div>
    </div>
</body>
</html>
