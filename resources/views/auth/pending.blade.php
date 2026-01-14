<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50">
        <div class="w-full sm:max-w-md mt-6 px-10 py-12 bg-white shadow-2xl overflow-hidden sm:rounded-[3rem] text-center border border-gray-100">
            <div class="w-24 h-24 bg-orange-100 text-orange-600 rounded-3xl flex items-center justify-center mx-auto mb-8 animate-pulse">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>

            <h2 class="text-3xl font-black text-gray-800 mb-4 tracking-tighter uppercase">Akun Pending</h2>
            <p class="text-gray-500 font-bold leading-relaxed mb-10">
                Halo {{ Auth::user()->name }}! Akun UMKM kamu sedang dalam proses <span class="text-orange-600">tinjauan admin</span>. Mohon tunggu verifikasi maksimal 1x24 jam ya.
            </p>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full bg-gray-800 text-white py-4 rounded-2xl font-black uppercase tracking-widest hover:bg-black transition-all shadow-xl shadow-gray-200">
                    Keluar Sesi
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
