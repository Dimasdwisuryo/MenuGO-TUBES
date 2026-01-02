<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - MenuGO</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gradient-to-br from-gray-50 to-green-50/30">
    <div class="min-h-screen flex flex-col justify-center items-center p-6">

        <div class="max-w-md w-full bg-white/80 backdrop-blur-xl rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] p-10 md:p-12 border border-white">

            <div class="text-center mb-10">
                <h2 class="text-3xl font-black text-gray-800 tracking-tight">
                    <span class="text-green-600">Menu</span>GO
                </h2>
                <p class="mt-2 text-sm text-gray-500 font-medium tracking-wide">
                    Selamat datang kembali, silakan masuk
                </p>
            </div>

            @if (session('status'))
                <div class="mb-6 p-4 bg-green-50 rounded-2xl border border-green-100 font-medium text-sm text-green-600 text-center animate-pulse">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div class="group">
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2 ml-1 group-focus-within:text-green-600 transition-colors">Alamat Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-green-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </span>
                        <input id="email"
                               class="block w-full pl-12 pr-5 py-4 rounded-2xl border-gray-100 bg-gray-50/50 focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 shadow-sm placeholder:text-gray-300"
                               type="email"
                               name="email"
                               placeholder="name@example.com"
                               value="{{ old('email') }}"
                               required autofocus />
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-2 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="group">
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-2 ml-1 group-focus-within:text-green-600 transition-colors">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-green-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </span>
                        <input id="password"
                               class="block w-full pl-12 pr-5 py-4 rounded-2xl border-gray-100 bg-gray-50/50 focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 shadow-sm placeholder:text-gray-300"
                               type="password"
                               name="password"
                               placeholder="Masukkan password"
                               required />
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-2 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-4 rounded-2xl shadow-xl shadow-green-200/50 text-sm font-extrabold text-white bg-green-600 hover:bg-green-700 active:scale-95 transition-all duration-300 transform hover:-translate-y-1">
                        Masuk Sekarang
                    </button>
                </div>
            </form>

            <div class="mt-10 text-center">
                <p class="text-sm text-gray-500 font-medium">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="font-bold text-green-600 hover:text-green-700 transition-colors underline underline-offset-4 decoration-green-200">
                        Daftar di sini
                    </a>
                </p>
            </div>
        </div>

        <div class="mt-12 text-center text-xs text-gray-400 font-semibold uppercase tracking-widest">
            © 2025 MenuGO Project — Tugas Besar
        </div>
    </div>
</body>
</html>
